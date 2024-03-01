<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function everyControll(){
        $allPosts = Post::all();
        $user = Auth::user(); 
        $allusers = User::all();
        $arr =[];
        $follows = $user->follows;
        foreach($follows as $follow){
            array_push($arr, $follow->id);
        }
        $userexceptfollows = User::whereNotIn('id', $arr)->get();



        $likes = Like::select('post_id')->where('user_id',$user->id)->get();
        // $data = compact('allPosts');
        return view('dashboard', ['allPosts'=> $allPosts, 'user'=>$user, 'likes'=> $likes, 'allusers'=>$allusers, 'userexceptfollows'=>$userexceptfollows, 'follows'=>$follows]);
    }

    public function demo(){

        $details = Post::find(5);
        if(is_null($details->postImg)){
            dd('true');
        }
        dd('flase');
    }

        // $alluser = User::where();
        // $user = User::find(2);
        // $currentUser = User::find(2);
        // $a = User::whereDoesntHave('followers', function ($query) use ($currentUser) {
        //     $query->where('', $currentUser->id);
        // $user = Auth::user(); 
        // // $allusers = User::all();
        // $exceptFollows = User::whereDoesntHave('followers', function ($query) use ($user) {
        //     $query->where('start_follow', '!=', $user->id);
        // })->get();
        // $arr =[];
        //     $s = $user->follows;
        //     foreach($s as $a){
        //         array_push($arr, $a->id);
        //     }
        //     print_r( $arr);
        //     $g = User::whereNotIn('id', $arr)->get();
        //     dd($s);
// dd($usersss);
    //    echo $s;
        // return '<img height=200 width=500 class="" src="storage/images/Ou4fbKvWiQvAjVkU351UxisNQldMuA2HEowAaUbD.jpg " alt="" />';
}
