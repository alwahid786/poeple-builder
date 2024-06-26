<?php

namespace App\Http\Controllers;

use App\Http\Traits\MailTrait;
use App\Http\Traits\UploadFilesTraits;
use App\Imports\UsersImport;
use App\Models\CompanyVideo;
use App\Models\GetInTouch;
use App\Models\RepliedVideo;
use App\Models\TermsAndConditions;
use App\Models\User;
use App\Models\UserAward;
use App\Models\UserReply;
use App\Models\WatchedVideo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{
    use UploadFilesTraits, MailTrait;
    public function companyDashboard(Request $request)
    {

        $users = (new User)->newQuery();
        if ($request->has('search') && !empty($request->search)) {
            $users = $users->where("name", "like", "%" . $request->search . "%");
        }

        $data['users'] = $users->where('user_type', 'user')->OrderBy('name', 'asc')->where('added_by', auth()->user()->id)->paginate(10);

        $data['stats'] = $this->getCompanyUserStats();
        // dd($data['stats']);

        if ($request->ajax()) {
            return response()->json(view('pages.company.partial-company-dashboard', $data)->render());
        }
        return view('pages.company.companydashboard', $data);
    }

    private function getCompanyUserStats()
    {
        $data['total_users'] = User::where('user_type', 'user')->where('added_by', auth()->user()->id)->count();
        $data['pending_users'] = User::where('user_type', 'user')->where('status', 0)->where('added_by', auth()->user()->id)->count();
        $data['approved_users'] = User::where('user_type', 'user')->where('status', 1)->where('added_by', auth()->user()->id)->count();
        // $data['rejected_users'] = User::where('user_type', 'user')->where('status', 2)->where('added_by', auth()->user()->id)->count();
        $data['latest_video_day'] = (UserReply::whereHas('user', function($query){
            $query->where('added_by','=',auth()->user()->id);
        })->OrderBy('id', 'desc')->value('day')) ?? '-';
        return $data;
    }

    public function companyVideo(Request $request)
    {
        $data['videoCounts'] = $this->getTotalMaxVideos();
        $count = ($request->count ?? $data['videoCounts']['max']) - 1;
        $data['videos'] = $this->getVideos($count);
        if ($request->ajax()) {
            return response()->json(view('pages.company.partial-videos', $data)->render());
        }
        return view('pages.company.companyvideo', $data);
        // return view('pages.company.companyvideo');
    }

    public
    function getVideos($offset)
    {
        $user_types = explode(',', auth()->user()->daily_video_types);
        $types = config('constants.VIDEO_TYPES_ARRAY');
        $mergedVideos = collect();
        foreach ($user_types as $user_type) {
            if (in_array(trim($user_type), $types)) {

                $videos = CompanyVideo::offset($offset)->withCount(['repliedVideo as total_replies' => function ($query) {
                    $query->CompanyReplyAccess();
                }]) // Starting from the 11th record
                    ->where('daily_video_types', $user_type)->limit(1)   // Retrieve 5 records
                    ->get();
                $mergedVideos = $mergedVideos->merge($videos);
            }
        }
        return $mergedVideos;
    }
    public function companyVideoDetail(Request $request, $id)
    {
        try {
            $data['video'] = CompanyVideo::findOrFail($id);
            $data['repliedVideo'] = RepliedVideo::CompanyReplyAccess()->where('video_id', $data['video']->id)->with('user')->paginate(6);
            if ($request->ajax()) {
                return response()->json(view('pages.user.partial-replies', ['videos' => $data['repliedVideo']])->render());
            }
            return view('pages.company.companyVideoDetail', $data);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function companyPrivacy()
    {
        $data['terms'] = TermsAndConditions::firstWhere(['type' => 1]);
        return view('pages.company.companyprivacy', $data);
    }
    public function companyTerm()
    {
        $data['terms'] = TermsAndConditions::firstWhere(['type' => 0]);
        return view('pages.company.companyterm', $data);
    }
    public function companyHelp(Request $request)
    {

        try {

            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'first_name' => 'required|string|max:100',
                    'last_name' => 'required|string|max:100',
                    'email' => 'required|email',
                    'message' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
                }
                $model = new GetInTouch();

                $model->first_name = $request->first_name;
                $model->last_name = $request->last_name;
                $model->phone_number = $request->phone_number;
                $model->email = $request->email;
                $model->message = $request->message;

                $model->save();

                $template = $this->helpRender($request->all());

                $sendMail = $this->sendMailTrait($template);

                if (!$sendMail) {
                    $request->session()->flash('error', 'Error sending mail');
                }

                $request->session()->flash('success', 'Your data has been submitted successfully.');
            }
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }


        return view('pages.company.companyhelp');
    }


    public function companySetting()
    {
        $data['user'] = User::find(auth()->user()->id);
        return view('pages.company.companySetting', $data);
    }
    public function addUser($id = '')
    {
        $user = [];
        if ($id != '') {
            $user = User::where('user_type', 'user')->where('added_by', auth()->user()->id)->find($id);
        }
        return view('pages.company.adduser', ['user' => $user]);
    }


    public function storeUser(Request $request)
    {
        try {
            // dd($request->all());

            $user_id = $request->user_id ?? '';
            $rules = [
                'name' => 'required|string|max:100',
                'phone_number' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email,' . $user_id,
            ];
            if ($user_id == '') {
                $label = 'Added';
                $rules['password'] = 'required|required_with:password_confirmation|same:password_confirmation';
                // $rules['password_confirmation'] = 'required|min:8';
                $rules['image'] = 'required|image|max:1024000';
            } else {
                $label = 'Updated';
                $rules['password'] = 'nullable|required_with:password_confirmation|same:password_confirmation';
                // $rules['password_confirmation'] = 'nullable|min:8';
                $rules['image'] = 'nullable|image|max:1024000';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
            }
            $data = $request->all();
            $data['user_type'] = 'user';
            $data['added_by'] = auth()->user()->id;
            if (!empty($request->password)) {
                $data['password'] = bcrypt($request->password);
            } else {
                unset($data['password']);
            }
            if ($request->file('image')) {
                $data['image'] = $this->uploadSingleFile($request->file('image'))['path'];
            }
            User::updateOrCreate([
                'id' => $request->user_id
            ], $data);

            return redirect('company-dashboard')->with('success', 'User Data '.$label.' successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function viewUser($id)
    {
        $data['user'] = User::where('user_type', 'user')->find($id);
        return view('pages.company.viewuser', $data);
    }
    public function updateProfile(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $user = Auth::user();
                $rules = [
                    'name' => 'required|string|max:100',
                    'location' => 'required|max:255',
                    'bio' => 'required|max:255',
                    'image' => 'nullable|image|max:1024000'
                    // 'email' => 'required|email|unique:users,email,' . $user_id,
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
                }
                $userData = [
                    'name' => $request->input('name'),
                    'location' => $request->input('location'),
                    'bio' => $request->input('bio'),
                    // Update other fields as needed
                ];
                if ($request->file('image')) {
                    $userData['image'] = $this->uploadSingleFile($request->file('image'))['path'];
                }
                $user->update($userData);
                return redirect()->back()->with('success', 'Profile updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return view('pages.company.updateprofile');
    }
    public function updatePassword()
    {
        return view('pages.company.updatepassword');
    }
    // Delete User
    public function deleteUser(Request $request)
    {
        try {
            $user = User::where('user_type', 'user')->where('added_by', auth()->user()->id)->find($request->id);
            $user->delete();
            return redirect()->back()->with('success', 'User Deleted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function exportExcelUser(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'user_file' => 'required|mimes:xls,xlsx'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
            }
            $file = $request->file('user_file');

            $duplicatedEmails = [];
            Excel::import(new UsersImport($duplicatedEmails), $file);
            $successMessage = 'User data imported successfully.';
            if (!empty($duplicatedEmails)) {
                $successMessage .= '<br>Duplicated emails: ' . implode(', ', $duplicatedEmails);
            }
            return redirect()->back()->with('success', $successMessage);
        } catch (ValidationException $e) {
            // Handle validation errors
            $validationErrors = $e->validator->getMessageBag()->all();

            // Redirect back with errors or handle them as needed
            return redirect()->back()->with('error', implode(',', $validationErrors));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function videoSettings(Request $request)
    {
        try {
            User::where('id', auth()->user()->id)->update([
                'is_community' =>  $request->is_community ?? 0,
                'is_employee' =>  $request->is_employee ?? 0,
                'monthly_budget' => $request->monthly_budget ?? 0,
                'grand_prize' => $request->grand_prize ?? 0,
                'super_prize' => $request->super_prize ?? 0,
                'other_prize' => $request->other_prize ?? 0,
            ]);
            return redirect()->back()->with('success', 'Settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // reject user status
    public function rejectUserStatus(Request $request)
    {
        try {
            // dd($request->all());
            $deleteUser = User::where('id', $request->id)->delete();
            if ($deleteUser) {
                return response()->json([
                    'status' => true,
                    'message' => 'User request rejected successfully.',
                ]);
            }
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()]);
        }
    }


    // watch video
    public function watchedVideo(Request $request)
    {
        try {
            $WatchedVideo = WatchedVideo::updateOrCreate([
                'user_id' => auth()->user()->id,
                'video_id' => $request->videoId
            ],[
                'user_id' => auth()->user()->id,
                'video_id' => $request->videoId
            ]);
            if ($WatchedVideo) {
                return response()->json([
                    'status' => true,
                    'message' => 'User watched video.',
                ]);
            }
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()]);
        }
    }

    // accept user status
    public function acceptUserStatus(Request $request)
    {
        try {

            $updateStatus = User::where('id', $request->id)->update([
                'status' => 1
            ]);
            if ($updateStatus) {
                return response()->json([
                    'status' => true,
                    'message' => 'User Approved Successfully.',
                ]);
            }
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function companyReward(Request $request)
    {
        $rewards = (new UserAward)->newQuery();
        if ($request->has('search') && !empty($request->search)) {
            $rewards->whereHas('user', function ($query) use ($request) {
                $query->where("name", "like", "%" . $request->search . "%");
            });
        }
        $data['userAwards'] = $rewards->with('award', 'user')->where('price', '!=', 0)->whereHas('user', function ($query) {
            $query->where('added_by', auth()->user()->id);
        })->paginate(10);
        if ($request->ajax()) {
            return response()->json(view('pages.company.partial-reward', $data)->render());
        }
        return view('pages.company.companyreward', $data);
    }
}
