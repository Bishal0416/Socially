<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Follower;

class ProfileViewController extends Controller
{
        public function show($userid){
        $allPosts = Post::where('user_id', $userid)->inRandomOrder()->get();
        $user = Auth::user(); 
        $allusers = User::inRandomOrder()->get();
        $currentUser = User::find($userid)->name;
        $arr =[];
        $follows = $user->follows;
        foreach($follows as $follow){
            array_push($arr, $follow->id);
        }
        $userexceptfollows = User::whereNotIn('id', $arr)->inRandomOrder()->get();
        $likes = Like::select('post_id')->where('user_id',$user->id)->get();
        return view('profileshow', ['allPosts'=> $allPosts, 'user'=>$user, 'likes'=> $likes, 'allusers'=>$allusers, 'userexceptfollows'=>$userexceptfollows, 'follows'=>$follows, 'currentuser'=>$currentUser]);
    }
}
