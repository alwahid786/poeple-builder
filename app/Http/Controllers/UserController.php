<?php

namespace App\Http\Controllers;

use App\Http\Traits\MailTrait;
use App\Http\Traits\ResponseTraits;
use App\Http\Traits\UploadFilesTraits;
use App\Models\Award;
use App\Models\CompanyVideo;
use App\Models\GetInTouch;
use App\Models\RepliedVideo;
use App\Models\TermsAndConditions;
use App\Models\User;
use App\Models\UserAward;
use App\Models\UserReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Mail;

class UserController extends Controller
{
    use MailTrait, UploadFilesTraits, ResponseTraits;
    // use UploadFilesTraits;
    public function userDashbaord()
    {

        $day = $this->GetDay();
        $data['videos'] = $this->getVideos($day - 1);
        $data['day'] = $day;
        // $data['awards'] = ((Award::inRandomOrder()->limit(25)->pluck('image_path'))->toArray());
        // dd($data['is_replied']);
        // dd($data['awards']);

        $rewardData = $this->rewardAccess($day);
        $data['free_hit_avaialble'] = $rewardData['free_hit_avaialble'];
        $data['is_show_reward'] = $rewardData['is_show_reward'];
        $data['is_replied'] = $rewardData['is_replied'];
        // dd($rewardData);
        return view('pages.user.userDashboard', $data);
    }
    public function userReply($id = '')
    {
        $todayVideo = CompanyVideo::whereDoesntHave('repliedVideo', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->find($id);
        $result = false;
        if ($todayVideo) {
            $day = $this->GetDay();
            $videos = $this->getVideos($day - 1);
            $result = $videos->first(function ($video) use ($todayVideo) {
                return $video->id === $todayVideo->id;
            });
        }
        if (!$result) {
            return redirect('user-dashboard')->with('error', 'Invalid Request.');
        }
        $data['video'] = $todayVideo;
        $rewardData = $this->rewardAccess($day);
        $data['free_hit_avaialble'] = $rewardData['free_hit_avaialble'];
        return view('pages.user.userReply', $data);
    }

    public function userVideo(Request $request)
    {
        $data['videoCounts'] = $this->getTotalMaxVideos();
        $data['user_types'] = explode(',', User::where('id', auth()->user()->added_by)->value('daily_video_types'));

        $data['day'] = $this->GetDay();
        $day = $request->count ?? ($data['day']);
        $data['videos'] = $this->getVideos($day - 1);
        // dd($data['user_types']);
        if ($request->ajax()) {
            return response()->json(view('pages.user.partial-videos', $data)->render());
        }
        return view('pages.user.userVideo', $data);
    }
    public function updateProfile(Request $request)
    {
        try {
            if ($request->isMethod('post')) {

                $user = Auth::user();
                $rules = [
                    'name' => 'required|string|max:100',
                    'phone_number' => 'required|string|max:100',
                    'image' => 'nullable|image|max:1024000'
                    // 'email' => 'required|email|unique:users,email,' . $user_id,
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
                }
                $userData = [
                    'name' => $request->input('name'),
                    'phone_number' => $request->input('phone_number'),
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
        return view('pages.user.update-profile');
    }
    public function updatePassword()
    {
        return view('pages.user.update-password');
    }


    public function  rewardSpinner()
    {

        if(UserAward::where([["user_id",auth()->user()->id],["video_id",request()->video_id]])->first()){
            return redirect('user-video')->with("error","Sorry! Reward already collected.");
        }


        $rewardData = $this->rewardAccess($this->GetDay());
        // Temporary comment, uncomment atfer testing
        // if(!$rewardData['is_show_reward']){
        //     return redirect('user-dashboard');
        // }

        $companyId = UserAward::where('user_id', auth()->user()->id)->value('company_id');

        $data['free_hit_avaialble'] = base64_decode($_GET['ft']) ?? 0;
        $data['awards'] = [
            asset('assets/images/rewards/empty_1.jpg'),
            asset('assets/images/rewards/empty_2.jpg'),
        ];
        $companyId = auth()->user()->added_by;
        $counts = UserAward::where('company_id', $companyId)
        ->groupBy('reward_type')
        ->selectRaw('reward_type, count(*) as count')
        ->pluck('count', 'reward_type');

        // check grand prize
        if(isset($counts['grand_prize']) && $counts['grand_prize'] > 0){
            $data['awards'][] = asset('assets/images/rewards/empty_3.png');
        }else{
            $data['awards'][] = auth()->user()->company_logo;
        }

        // check super prizes
        if(isset($counts['super_prize']) && $counts['super_prize'] > 2){
            $data['awards'][] = asset('assets/images/rewards/empty_6.png');
        }else{
            $data['awards'][] = asset('assets/images/rewards/super_prize.png');
        }

        // check other prizes
        if(isset($counts['other_prize']) && $counts['other_prize'] > 3){
            $data['awards'][] = asset('assets/images/rewards/empty_5.png');
        }else{
            $data['awards'][] = asset('assets/images/rewards/other_prize.png');
        }

        return view('pages.user.spinner-reward', $data);
    }
    public function userVideoDetail(Request $request, $id)
    {
        try {

            $day = $this->GetDay();
            $data['day'] = $day;
            $rewardData = $this->rewardAccess($day);
            $data['free_hit_avaialble'] = $rewardData['free_hit_avaialble'];
            $data['video'] = CompanyVideo::findOrFail($id);
            $data['repliedVideo'] = RepliedVideo::where([['video_id', $data['video']->id],["user_id",auth()->user()->id]])->with('user')->paginate(6);
            $data['show_button'] = true;
            if(UserAward::where([["user_id",auth()->user()->id],["video_id",$id]])->first()){
                $data['show_button'] = false;
            }
            if ($request->ajax()) {
                return response()->json(view('pages.user.partial-replies', ['videos' => $data['repliedVideo']])->render());
            }
            return view('pages.user.userVideoDetail', $data);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function userPrivacy()
    {
        $data['terms'] = TermsAndConditions::firstWhere(['type' => 1]);
        return view('pages.user.userprivacy', $data);
    }
    public function userTerm()
    {
        $data['terms'] = TermsAndConditions::firstWhere(['type' => 0]);
        return view('pages.user.userterm', $data);
    }
    public function userHelp(Request $request)
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
                    return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
                }
                $model = new GetInTouch();

                $model->first_name = $request->first_name;
                $model->last_name = $request->last_name;
                $model->phone_number = $request->phone_number;
                $model->email = $request->email;
                $model->message = $request->message;

                $model->save();

                $template = $this->helpRender($request->all());

                $data = ["html"=>$template];
                $sendMail = $this->sendMailTrait($template);

                if (!$sendMail) {
                    $request->session()->flash('error', 'Error sending mail');
                }

                $request->session()->flash('success', 'Your data has been submitted successfully.');
            }
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        return view('pages.user.userhelp');
    }
    public function userReview()
    {
        return view('pages.user.userreview');
    }

    public function userOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);
            if ($validator->fails()) {
                return redirect('forgot-password')->with('error', implode(',', $validator->errors()->all()));
            }
            $pin = rand(1000, 9999);

            $template = $pin;

            $template = $this->render($pin);
            $this->sendMailTrait($template, $request->email);
            // $pin = 1234;
            User::where('email', $request->email)->update(['pin_code' => $pin]);
            return view('pages.user.otp');
        } catch (Exception $ex) {
            return redirect('forgot-password')->with('error', $ex->getMessage());
        }
    }

    public function render($pin)
    {
        return view('emails.one-time-otp', [
            'otp' => $pin
        ])->render();
    }
    public function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'pin_code' => 'required|integer|min:4'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
            }
            if (!User::where([
                'email' => $request->email,
                'pin_code' => $request->pin_code
            ])->exists()) {
                return redirect()->back()->with('error', 'Invalid code or expired. Please resend a new code.');
            }
            return view('pages.user.newpassword');
        } catch (Exception $ex) {
            return redirect('forgot-password')->with('error', $ex->getMessage());
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required|required_with:password_confirmation|same:password_confirmation',
                'pin_code' => 'required|integer',
                'email' => 'required|email|exists:users,email'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
            }
            $user = User::where('email', $request->email)->where('pin_code', $request->pin_code)->first();
            if (!$user) {
                return redirect('forgot-password')->with('error', 'Invalid code or expired. Please resend a new code!');
            }
            $user->password = bcrypt($request->password);
            $user->pin_code = NULL;
            $user->save();
            return redirect('/')->with('success', 'Password has been changed successfully.');
        } catch (Exception $ex) {
            return redirect('forgot-password')->with('error', $ex->getMessage());
        }
    }


    public function getVideos($offset)
    {
        $user_types = explode(',', User::where('id', auth()->user()->added_by)->value('daily_video_types'));
        $types = config('constants.VIDEO_TYPES_ARRAY');
        $mergedVideos = collect();
        foreach ($user_types as $user_type) {
            if (in_array(trim($user_type), $types)) {
                $videos = CompanyVideo::offset($offset) // Starting from the 11th record
                    -> withCount(['repliedVideo as is_replied' => function ($query) {
                        $query->where('user_id', auth()->user()->id);
                        }, 'wathedVideo as is_watched' => function ($query) {
                        $query->where('user_id', auth()->user()->id);
                        }])
                    ->where('daily_video_types', $user_type)->limit(1)   // Retrieve 5 records
                    ->get();
                $mergedVideos = $mergedVideos->merge($videos);
            }
        }
        return $mergedVideos;
    }

    public function recordedVideos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video' => 'required',
            'video_id' => 'required|exists:company_videos,id'
        ]);
        if ($validator->fails()) {
            return $this->sendError(implode(',', $validator->errors()->all()), 200);
        }
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        if ($request->file('video')) {
            $fileDetails = $this->uploadSingleFile($request->file('video'));
            $data['video_path'] = $fileDetails['path'];
            $base64Image = $request->thumbnail;
            $data['thumbnail'] = $this->uplaodThumbnail($base64Image);
        }
        $day = $this->GetDay();

        // $reply = UserReply::whereDate('created_at', now())
        //     ->where('user_id', $data['user_id'])
        //     ->updateOrCreate([
        //         'user_id' => $data['user_id'],
        //         'day' => $day
        //     ]);
        $reply = UserReply::create([
                'user_id' => $data['user_id'],
                'day' => $day
            ]);
            // dd($reply);
        RepliedVideo::create([
            'user_reply_id' => $reply->id,
            'video_id' => $data['video_id'],
            'video_path' => $data['video_path'],
            'user_id' => $data['user_id'],
            'thumbnail' => $data['thumbnail'],
            'day'=>$day
        ]);
        return $this->sendResponse('Your reply has been added successfully. Now Play for Prizes!');
    }

    public function GetDay()
    {
        $replyDay = UserReply::where('user_id', auth()->user()->id)->OrderBy('id', 'desc')->first();
        if ($replyDay) {
            if (date('Y-m-d', strtotime($replyDay->created_at)) == date('Y-m-d')) {
                $currentDay = $replyDay->day;
                $totalDays = UserReply::where('day', $currentDay)->count();
                $videosForDay = sizeof($this->getVideos($currentDay-1));
                if($totalDays==$videosForDay){
                    $day = ($replyDay->day + 1);
                }else{
                $day = $replyDay->day;
                }
            } else {
                $day = ($replyDay->day + 1);
            }
        } else {
            $day = 1;
        }
        return $day;
    }
    public function userReward(Request $request)
    {
        $data['userAwards'] = UserAward::where('user_id', auth()->user()->id)->where('price', '!=', 0)->paginate(10);
        if ($request->ajax()) {
            return response()->json(view('pages.user.partial-reward', $data)->render());
        }
        return view('pages.user.userreward', $data);
    }
    public function addReward(Request $request)
    {
        try {

            $priceValue = 0;
            if ($request->awardType) {
                $companyId = auth()->user()->added_by;
                $companyData = User::find($companyId);


                switch ($request->awardType) {
                    case 'grand_prize':
                        $priceValue = $companyData->monthly_budget * $companyData->grand_prize / 100;
                        break;
                    case 'super_prize':
                        $priceValue = ($companyData->monthly_budget * $companyData->super_prize / 100)/3;
                        break;
                    case 'other_prize':
                        $priceValue = ($companyData->monthly_budget * $companyData->other_prize / 100)/4;
                        break;
                    default:
                    $priceValue = 0;
                        break;
                }
            }
            $day = $this->GetDay();
            // UserAward::updateOrCreate(
            //     [
            //         'user_id' => auth()->user()->id,
            //         'day' => $day,
            //         'spin_type' => $request->free_hit_avaialble ?? 0
            //     ],
            //     [
            //         'reward_type' => $request->awardType ?? null,
            //         'price' => round($priceValue) ?? null,
            //         'company_id' => auth()->user()->added_by,
            //         'spin_type' => $request->free_hit_avaialble ?? 0,
            //         'video_id'=>$request->video_id
            //     ]
            // );
          $record =  UserAward::create([
                'user_id' => auth()->user()->id,
                'day' => $day,
                'spin_type' => $request->free_hit_avaialble ?? 0,
                'reward_type' => $request->awardType ?? null,
                'price' => round($priceValue) ?? null,
                'company_id' => auth()->user()->added_by,
                'video_id' => $request->video_id
            ]);

            // $mail_data = [];

            // $mail_data['user_name'] = auth()->user()->name;
            // $mail_data['reward_day'] = $day;
            // $mail_data['reward_price'] = round($priceValue);
            // $mail_data['company'] = auth()->user()->userCompany->name;
            // $mail_data['video'] = $record->video->name;


            $admin = User::where("user_type",'admin')->first();

            // $recipients = [
            //     ['email' => auth()->user()->email, 'name' => auth()->user()->name,'type'=>'user'],
            //     ['email' => $admin->email, 'name' => $admin->name,'type'=>'admin'],
            //     ['email' => auth()->user()->userCompany->email, 'name' => auth()->user()->userCompany->name ,'type'=>'company']
            // ];

            // foreach ($recipients as $recipient) {
            //     $mail_data['type'] = $recipient['type'];
            //     $mail_data['name'] = $recipient['name'];

            //     Mail::send('emails.reward', $mail_data, function ($message) use ($recipient) {
            //         $message->to($recipient['email'], $recipient['name'])
            //                 ->subject('Reward');
            //         $message->from('admin@tetra.com', 'Tetra Tech');
            //     });
            // }


            // return $this->sendError(implode(',', $validator->errors()->all()), 200);
            return $this->sendResponse('Award data.', $priceValue);
        } catch (Exception $ex) {
            return $this->sendError($ex->getMessage(), 200);
        }
    }

    public function storePassword(Request $request)
    {
        try {
            $rules['old_password'] = 'required';
            $rules['new_password'] = 'required|required_with:password_confirmation|same:password_confirmation';
            $rules['password_confirmation'] = 'required';

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()));
            }
            $user = User::findOrFail(auth()->user()->id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();

                return redirect()->back()->with('success', 'Password Updated Successfully.');
            } else {
                return redirect()->back()->with('error', 'The Old Password does not match');
            }
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
