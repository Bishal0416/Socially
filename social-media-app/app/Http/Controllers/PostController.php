<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost(Request $req){

        // echo"<pre>";
        // echo"$req";
        // to get auth user;
        // $data = auth()->user();
        // $data->name;

        $validated = $req->validate([
            'post_text' => 'required',
            'post_img' => 'image|max:5120',
        ]);
        $post = new Post();
        $imagePath = $req->file('post_img')->store('images', 'public');
        $post->user_id=auth()->user()->id;
        $post->postText=$req->input('post_text');
        $post->postImg = $imagePath;
        $post->like_count = 0;
        $post->save();
        return redirect('/dashboard');
    }
}
