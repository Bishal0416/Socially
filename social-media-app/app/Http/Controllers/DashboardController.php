<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function allPostshow(){
        $allPosts = Post::all();
        // $data = compact('allPosts');
        return view('dashboard', ['allPosts'=> $allPosts]);
    }

    public function demo(){
        // $allPosts = Post::all();
        // $data = compact('allPosts');
        // echo"<pre>";
        // print_r($allPosts);
        return '<img height=200 width=500 class="" src="storage/images/Ou4fbKvWiQvAjVkU351UxisNQldMuA2HEowAaUbD.jpg " alt="" />';
        }
}
