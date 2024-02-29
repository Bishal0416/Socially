<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;

class FollowController extends Controller
{
    public function followerAdd($user_id){
        $follow = new Follower();
        // dd($follow->all());
        $follow->start_follow=auth()->user()->id;
        $follow->to_follows=$user_id;
        $follow->save();
        return redirect("/dashboard");

        // echo $user_id;
        // return true;

    }

    public function followerRemove($user_id){
        $followremove = Follower::where('to_follows', $user_id)->delete();
        return redirect("/dashboard");
    }
}
