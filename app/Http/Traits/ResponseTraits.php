<?php

namespace App\Http\Traits;

use App\Models\UserAward;
use App\Models\UserReply;
use Carbon\Carbon;

trait ResponseTraits
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($message, $result = [])
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 422)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        return response()->json($response, $code);
    }

    public
    function rewardAccess($day)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $companyId = auth()->user()->added_by;

        $data['is_replied'] = UserReply::where('user_id', auth()->user()->id)->where('day', $day)->count();
        $data['is_got_award'] = UserAward::where('user_id', auth()->user()->id)->where('day', $day)->count();
        $data['month_count'] = UserAward::where('company_id', $companyId)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('price', '!=', 0)
            ->count();

        $data['week_count'] = UserAward::where('company_id', $companyId)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->where('price', '!=', 0)
            ->count();

        $latest = UserAward::where('user_id', auth()->user()->id)->latest()->first();
        if ($latest && $latest->spin_type == 1) {
            $last_free_spin = true;
        } else {
            $last_free_spin = false;
        }
        $is_not_5th = true;
        $total = UserAward::where('user_id', auth()->user()->id)->where('spin_type', 0)->count();
        if($total>0){
        $is_not_5th = fmod($total, 5);
        }
        if (!$last_free_spin && !$is_not_5th) {
            $data['free_hit_avaialble'] = true;
        } else {
            $data['free_hit_avaialble'] = false;
        }
        if ((($data['free_hit_avaialble']) || ($data['is_replied'] > 0 && !$data['is_got_award'])) && $data['week_count'] < 2 && $data['month_count'] <= 7) {
            $data['is_show_reward'] = true;
        } else {
            $data['is_show_reward'] = false;
        }
        // $data['is_show_reward'] = true;

        return $data;
    }
}
