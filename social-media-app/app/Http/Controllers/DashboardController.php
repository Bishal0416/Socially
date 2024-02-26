<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function allPostshow(){
        $allPosts = Post::all();
        $user = Auth::user(); 
        $likes = Like::select('post_id')->where('user_id',$user->id)->get();
        // $data = compact('allPosts');
        return view('dashboard', ['allPosts'=> $allPosts, 'user'=>$user, 'likes'=> $likes]);
    }

    public function demo(){
        // $allPosts = Post::all();
        // $data = compact('allPosts');
        // echo"<pre>";
        // print_r($allPosts);
        return '<img height=200 width=500 class="" src="storage/images/Ou4fbKvWiQvAjVkU351UxisNQldMuA2HEowAaUbD.jpg " alt="" />';
        }
}
