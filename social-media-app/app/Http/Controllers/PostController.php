<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'post_img' => 'image|max:5120|nullable',
        ]);
        $post = new Post();
        if(!is_null($req->file('post_img'))){
            $imagePath = $req->file('post_img')->store('images', 'public');
            $post->postImg = $imagePath;
        }
        else{
            $post->postImg =null;
        }
        $post->user_id=auth()->user()->id;
        $post->postText=$req->input('post_text');
        $post->like_count = 0;
        $post->save();
        return redirect('/dashboard');
    }

    public function deletePost($postid){
        $deletePost = Post::find($postid);
        if(!is_null($deletePost)){
            if(!is_null($deletePost->postImg)){
                $path = "storage/$deletePost->postImg";
                Storage::delete($path);
            }
            // dd($deletePost->postImg);
            $deletePost->delete();
        }
        return redirect('/dashboard');
    }

    public function editPost($postid, Request $req){
        $validated = $req->validate([
            'post_text' => 'required',
            'post_img' => 'image|max:5120|nullable',
        ]);

        $updatePost = Post::find($postid);
        if(!is_null($updatePost)){
            if(!is_null($req->file('post_img'))){
                $imagePath = $req->file('post_img')->store('images', 'public');
                $updatePost->postImg = $imagePath;
            }
            else{
                $updatePost->postImg =null;
            }
            $updatePost->user_id=auth()->user()->id;
            $updatePost->postText=$req->input('post_text');
            $updatePost->like_count = 0;
            $updatePost->save();
        }
        return redirect('/dashboard');
    }
}
