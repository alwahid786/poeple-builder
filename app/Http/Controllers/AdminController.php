<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFilesTraits;
use App\Http\Traits\MailTrait;
use App\Models\User;
use App\Models\GetInTouch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Exports\ExportUsers;
use App\Imports\CompanyImport;
use App\Imports\UsersImport;
use App\Models\Award;
use App\Models\CompanyVideo;
use App\Models\RepliedVideo;
use App\Models\TermsAndConditions;
use App\Models\RepliedVideoViews;
use App\Models\UserAward;
use App\Models\UserReply;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    use UploadFilesTraits;
    use MailTrait;

    // user signup
    public function userCreateAccount(Request $request)
    {
        if ($request->isMethod('post')) {
            try {

                $rules = [
                    'name' => 'required|string|max:100',
                    'email' => 'required|email|unique:users,email',
                    'phone_number' => 'required|max:255',
                    'system_id' => 'required|exists:users,system_id',
                    'password' => 'required|required_with:password_confirmation|same:password_confirmation'
                ];

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
                }

                $userExists = User::where('system_id', $request->system_id)->first();

                if (null != $userExists) {

                    $data = $request->all();

                    if ($request->image) {
                        $data['image'] = $this->uploadSingleFile($request->image)['path'];
                    }

                    $data['user_type'] = 'user';
                    $data['added_by'] = $userExists->id;
                    $data['system_id'] = null;
                    $data['status'] = 0;
                    $data['password'] = bcrypt($request->password);

                    $createUser = User::create($data);
                    if ($createUser) {
                        return redirect('/')->with('success', 'Account created successfully.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Company id is invalid.');
                }
            } catch (\Exception $e) {

                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return view('pages.user.signup');
    }

    // user Login Form
    public function userLoginForm()
    {
        return view('pages.user.login');
    }

    // user Feed data
    public function feed()
    {
        $companyId = auth()->user()->added_by;
        $company = User::with('companyUsers')->find($companyId);
        $companyUsers = User::where('added_by', $companyId)->get();
        $companyVideoReplies = collect();

        // if ($companyUsers->isNotEmpty()) {
        //     foreach ($companyUsers as $companyUser) {
        //         $replies = RepliedVideo::with('user')->where('user_id', $companyUser->id)->get();
        //         $companyVideoReplies = $companyVideoReplies->merge($replies);
        //     }
        // }
        if ($companyUsers->isNotEmpty()) {
            $userIds = $companyUsers->pluck('id')->toArray();
            $companyVideoReplies = RepliedVideo::with('user')
            ->leftJoin('replied_video_views', function ($join) use ($userIds) {
                $join->on('replied_videos.id', '=', 'replied_video_views.reply_video_id')
                ->whereIn('replied_video_views.user_id', $userIds);
            })
                ->orderByRaw('CASE WHEN replied_video_views.id IS NULL THEN 0 ELSE 1 END')
                ->select('replied_videos.*', DB::raw('CASE WHEN replied_video_views.id IS NULL THEN 0 ELSE 1 END AS is_watched'))
                ->get();
        }
        // dd(json_decode($companyVideoReplies));
        return view('pages.user.feed', compact('company', 'companyUsers', 'companyVideoReplies'));
    }

    // Watch video
    public function watchVideo(Request $request)
    {
        $userId = auth()->id();
        $videoId = $request->video_id;

        // Check if the video has already been watched by this user
        $watched = RepliedVideoViews::where('user_id', $userId)
        ->where('reply_video_id', $videoId)
        ->first();

        if (!$watched) {
            // Mark the video as watched
            RepliedVideoViews::create([
                'user_id' => $userId,
                'reply_video_id' => $videoId,
                'watched_at' => now(),
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function updateProfile(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $user = Auth::user();
                $rules = [
                    'name' => 'required|string|max:100',
                    'image' => 'nullable|image|max:1024000'
                    // 'email' => 'required|email|unique:users,email,' . $user_id,
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
                }
                $userData = [
                    'name' => $request->input('name'),
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
        return view('pages.superadmin.adminUpdateProfile');
    }
    public function updatePassword()
    {
        return view('pages.superadmin.adminUpdatePassword');
    }
    // User Login Function
    public function userLoginPostReq(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->route('user.login')->with('error', implode(',', $validator->errors()->all()));
                }
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'user'])) {
                    $user_status = auth()->user()->status;
                    if ($user_status != 0) {
                        return redirect('user-dashboard')->with('success', 'You have logged in successfully.');
                    } else {
                        Auth::logout();
                        return redirect()->route('user.login')->with('error', 'Your request is pending for approval. Please contact your company for further assistance.');
                    }
                } else {
                    return redirect()->route('user.login')->with('error', 'wrong credientials');
                }
            } catch (\Exception $e) {
                return redirect()->route('user.login')->with('error', $e->getMessage());
            }
        }
    }

    // Company Login Function
    public function companyLogin(Request $request)
    {

        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->route('company.login')->with('error', implode(',', $validator->errors()->all()));
                }

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'company'])) {

                    return redirect('company-dashboard')->with('success', 'You have logged in successfully.');
                } else {
                    return redirect()->route('company.login')->with('error', 'wrong credientials');
                }
            } catch (\Exception $e) {
                return redirect()->route('company.login')->with('error', $e->getMessage());
            }
        }

        return view('pages.company.login');
    }

    // Admin Login Function
    public function adminLogin(Request $request)
    {

        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->route('admin.login')->with('error', implode(',', $validator->errors()->all()));
                }

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin'])) {
                    return redirect('dashboard')->with('success', 'You have logged in successfully.');
                } else {
                    return redirect()->route('admin.login')->with('error', 'wrong credientials');
                }
            } catch (\Exception $e) {
                return redirect()->route('admin.login')->with('error', $e->getMessage());
            }
        }

        return view('pages.superadmin.login');
    }

    // Dashboard Function
    public function dashboard(Request $request)
    {
        $users = (new User)->newQuery();
        if ($request->has('search') && !empty($request->search)) {
            $users = $users->where(function ($query) use ($request) {
                $query->where("name", "like", "%" . $request->search . "%");
                $query->orWhere("email", "like", "%" . $request->search . "%");
            });
        }
        if ($request->has('dailyTypes') && !empty($request->dailyTypes)) {
            $typesArray = $request->dailyTypes;

            $users = $users->where(function ($query) use ($typesArray) {
                foreach ($typesArray as $type) {
                    $query->orWhereRaw("FIND_IN_SET(?, daily_video_types)", [$type]);
                }
            });
        }
        $users->withCount('companyUsers as total_users');
        $data['companies'] = $users->where('user_type', 'company')->OrderBy('name', 'asc')->paginate(10);
        // dd($data['companies']->toArray());
        if ($request->ajax()) {
            return response()->json(view('pages.superadmin.partial-dashboard', $data)->render());
        }
        $data['stats'] = $this->getDashboardStatics();
        return view('pages.superadmin.dashboard', $data);
    }

    private function getDashboardStatics()
    {
        $data['total_companies'] = User::where('user_type', 'company')->count();
        $data['total_users'] = User::where('user_type', 'user')->count();
        $data['total_videos'] = CompanyVideo::count();
        $data['gratitude_videos'] = CompanyVideo::where('daily_video_types', 'Gratitude Share')->count();
        $data['wow_videos'] = CompanyVideo::where('daily_video_types', 'WOW Share')->count();
        $data['win_videos'] = CompanyVideo::where('daily_video_types', 'WIN Share')->count();
        $data['cxtip_videos'] = CompanyVideo::where('daily_video_types', 'CX Tip')->count();
        $data['salestip_videos'] = CompanyVideo::where('daily_video_types', 'Sales Tip')->count();
        return $data;
    }

    // View Company
    public function viewCompany($id)
    {
        $data['company'] = User::where('user_type', 'company')->find($id);
        return view('pages.superadmin.viewcompany', $data);
    }

    public function privacyPolicy(Request $request)
    {

        if ($request->method() === 'POST') {
            $data = $request->all();
            $dat['data'] = trim($data['data']);
            $validator = Validator::make($data, [
                'data' => 'filled'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', implode(",", $validator->errors()->all()));
            }
            TermsAndConditions::updateOrCreate([
                'type' => 1,
            ], $data);
            return Redirect::back()->with('success', 'Privacy Polices updated successfully');
        } else {
            $data['terms'] = TermsAndConditions::firstWhere(['type' => 1]);
        }
        return view('pages.superadmin.privacypolicy', $data);
    }
    public function termCondition(Request $request)
    {

        if ($request->method() === 'POST') {
            $data = $request->all();
            $dat['data'] = trim($data['data']);
            $validator = Validator::make($data, [
                'data' => 'filled'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', implode(",", $validator->errors()->all()));
            }
            TermsAndConditions::updateOrCreate([
                'type' => 0,
            ], $data);
            return Redirect::back()->with('success', 'Terms and conditions updated successfully');
        } else {
            $data['terms'] = TermsAndConditions::firstWhere(['type' => 0]);
        }
        return view('pages.superadmin.termcondition', $data);
    }

    public function render($request)
    {
        return view('emails.get_in_touch_email', [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'message' => $request['message'],
        ])->render();
    }
    public function help(Request $request)
    {

        $data['help'] = GetInTouch::paginate(6);
        // dd($help->toArray());
        if ($request->ajax()) {
            return response()->json(view('pages.superadmin.partial-help', $data)->render());
        }
        return view('pages.superadmin.help', $data);
        // return view('pages.superadmin.help');
    }
    public function helpDetail(Request $request, $id)
    {
        if ($request->method() === 'POST') {
            $data = $request->all();
            $validator = Validator::make($data, [
                'reply' => 'required'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->with('error', implode(",", $validator->errors()->all()));
            }
            GetInTouch::where('id', $id)->update([
                'reply' => $request->reply,
            ]);
            return redirect('help')->with('success', 'Reply has sent successfully.');
        }
        $data['help'] = GetInTouch::find($id);
        return view('pages.superadmin.help-detail', $data);
    }
    public function helpBk(Request $request)
    {

        try {

            if ($request->isMethod('post')) {

                $model = new GetInTouch();

                $model->first_name = $request->first_name;
                $model->last_name = $request->last_name;
                $model->phone_number = $request->phone_number;
                $model->email = $request->email;
                $model->message = $request->message;

                $model->save();

                $template = $this->render($request->all());

                $sendMail = $this->sendMailTrait($template);

                if (!$sendMail) {
                    $request->session()->flash('error', 'Error sending mail');
                }

                $request->session()->flash('success', 'Mail sent successfully');
            }
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }


        return view('pages.superadmin.help-bk');
    }

    public function addCompany($id = '')
    {
        $company = [];
        if ($id != '') {
            $company = User::where('user_type', 'company')->find($id);
            // dd(explode(',', $company->daily_video_types));
        }
        return view('pages.superadmin.addcompany', ['company' => $company]);
    }

    public function storeCompany(Request $request)
    {
        try {
            // dd($request->all());

            $company_id = $request->company_id ?? '';
            $data = $request->all();
            $rules = [
                'name' => 'required|string|max:100',
                'location' => 'required|max:255',
                'bio' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $company_id,
                'daily_video_types' => 'array|required'
            ];
            if ($company_id == '') {
                $label = 'Added';
                $rules['password'] = 'required|required_with:password_confirmation|same:password_confirmation';
                // $rules['password_confirmation'] = 'required|min:8';
                $rules['image'] = 'required|image|max:1024000';
                $uuid = base64_encode(hex2bin(str_replace('-', '', Str::uuid())));
                $system_id = substr($uuid, 0, 10);
                $data['system_id'] = $system_id;
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
            $data['daily_video_types'] = implode(',', $data['daily_video_types']);
            $data['user_type'] = 'company';
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
                'id' => $request->company_id
            ], $data);

            return redirect('dashboard')->with('success', 'Company Data ' . $label . ' Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Delete Company
    public function deleteCompany(Request $request)
    {
        try {
            $user = User::where('user_type', 'company')->find($request->id);
            $user->delete();
            User::where('user_type', 'user')->where('added_by', $request->id)->delete();
            return redirect()->back()->with('success', 'Company Deleted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    // User Logout
    public function userLogout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have logged out successfully.');
    }
    // company Logout
    public function companyLogout()
    {
        Auth::logout();
        return redirect('company-login')->with('success', 'You have logged out successfully.');
    }
    // admin Logout
    public function adminLogout()
    {
        Auth::logout();
        return redirect('admin-login')->with('success', 'You have logged out successfully.');
    }

    // export user

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
            Excel::import(new CompanyImport($duplicatedEmails), $file);
            $successMessage = 'Company data imported successfully.';
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


    public function adminVideo(Request $request)
    {
        $data['videoCounts'] = $this->getTotalMaxVideos();
        $count = ($request->count ?? $data['videoCounts']['max']) - 1;
        $data['d_no'] = $count + 1;
        $data['videos'] = $this->getVideos($count);
        if ($request->ajax()) {
            return response()->json(view('pages.superadmin.partial-videos', $data)->render());
        }
        return view('pages.superadmin.adminvideo', $data);
    }

    public function getVideos($offset)
    {

        $types = config('constants.VIDEO_TYPES_ARRAY');
        $mergedVideos = collect();
        foreach ($types as $user_type) {

            $videos = CompanyVideo::offset($offset)->withCount(['repliedVideo as total_replies']) // Starting from the 11th record
                ->where('daily_video_types', $user_type)->limit(1)   // Retrieve 5 records
                ->get();
            $mergedVideos = $mergedVideos->merge($videos);
        }
        return $mergedVideos;
    }
    public function createVideo($id = '')
    {
        $data['video'] = [];
        if ($id != '') {
            $data['video'] = CompanyVideo::find($id);
            $data['d_no'] = $_GET['dn'] ?? '';
        }
        $data['videoCounts'] = $this->getTotalMaxVideos();
        return view('pages.superadmin.adminVideoCreate', $data);
    }


    public function storeVideo(Request $request)
    {
        try {

            $video_id = $request->video_id ?? '';
            $rules = [
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:255',
                'daily_video_types' => 'required'
            ];
            if ($video_id == '') {
                $label = 'Added';
                $rules['video'] = 'required|max:10240000';
            } else {
                $label = 'Updated';
                $rules['video'] = 'nullable|max:10240000';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
            }
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            if ($request->file('video')) {
                $data['video_path'] = $this->uploadSingleFile($request->file('video'))['path'];
                $base64Image = $request->thumbnail_field;
                $data['thumbnail'] = $this->uplaodThumbnail($base64Image);
            }
            CompanyVideo::updateOrCreate([
                'id' => $request->video_id
            ], $data);

            return redirect('admin-video')->with('success', 'Video Data ' . $label . ' Successfully.');;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function editVideo()
    {
        return view('pages.company.companyVideoEdit');
    }
    // Delete Video
    public function deleteVideo(Request $request)
    {
        try {
            $user = CompanyVideo::find($request->id);
            $user->delete();
            return redirect()->back()->with('success', 'Video Deleted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    // Video details

    public function adminVideoDetail(Request $request, $id)
    {
        try {
            $data['video'] = CompanyVideo::findOrFail($id);
            $data['repliedVideo'] = RepliedVideo::where('video_id', $data['video']->id)->with('user')->paginate(6);
            if ($request->ajax()) {
                return response()->json(view('pages.user.partial-replies', ['videos' => $data['repliedVideo']])->render());
            }
            return view('pages.superadmin.adminVideoDetail', $data);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function reward(Request $request)
    {
        // DB::enableQueryLog();
        $rewards = (new UserAward)->newQuery();
        if ($request->has('search') && !empty($request->search)) {
            $rewards->whereHas('user', function ($query) use ($request) {
                $query->where("name", "like", "%" . $request->search . "%");
                $query->orWhereHas('userCompany', function ($query) use ($request) {
                    $query->where("name", "like", "%" . $request->search . "%");
                });
            });
        }
        $data['userAwards'] = $rewards->with('award', 'user.userCompany')->where('price', '!=', 0)->paginate(10);
        // dd(DB::getQueryLog());
        if ($request->ajax()) {
            return response()->json(view('pages.superadmin.partial-reward', $data)->render());
        }
        return view('pages.superadmin.reward', $data);
    }
    public function adminReward(Request $request)
    {
        $rewards = (new Award)->newQuery();
        if ($request->has('search') && !empty($request->search)) {
            $rewards->where("title", "like", "%" . $request->search . "%");
            // $rewards->orWhere("description", "like", "%" . $request->search . "%");
        }
        $data['rewards'] = $rewards->paginate(10);
        if ($request->ajax()) {
            return response()->json(view('pages.superadmin.partial-adminReward', $data)->render());
        }
        return view('pages.superadmin.adminReward', $data);
    }
    public function addReward($id = '')
    {
        $data['reward'] = [];
        if ($id != '') {
            $data['reward'] = Award::find($id);
            // dd(explode(',', $company->daily_video_types));
        }
        return view('pages.superadmin.addReward', $data);
    }
    public function storeReward(Request $request)
    {
        try {
            // dd($request->all());

            $reward_id = $request->reward_id ?? '';
            $data = $request->all();
            $rules = [
                'title' => 'required|string|max:100',
                'description' => 'required|max:255',
            ];
            if ($reward_id == '') {
                $label = 'Added';
                $rules['image_path'] = 'required|image|max:1024000';
            } else {
                $label = 'Updated';
                $rules['image_path'] = 'nullable|image|max:1024000';
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
            }
            if ($request->file('image_path')) {
                $data['image_path'] = $this->uploadSingleFile($request->file('image_path'))['path'];
            }
            Award::updateOrCreate([
                'id' => $request->reward_id
            ], $data);

            return redirect('adminReward')->with('success', 'Reward Data ' . $label . ' successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // Delete Reward
    public function deleteReward(Request $request)
    {
        try {
            $user = Award::find($request->id);
            $user->delete();
            return redirect()->back()->with('success', 'Reward Deleted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function adminRewardDetail()
    {
        return view('pages.superadmin.adminRewardDetail');
    }
}
