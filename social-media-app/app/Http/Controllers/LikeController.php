<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function likePost($postid)
    {
        $user = auth()->user(); 
     //    return $user;
     //    dd();
        $Like = new Like();
        $Like->post_id = $postid;
        $Like->user_id = $user->id;
        $Like->save();
        $likesValue=Post::select('like_count')->where('post_id', $postid)->get();
        Post::where('post_id', $postid)->update(['like_count' => $likesValue[0]['like_count']+1]);
        return true;     
    }
    public function dislikePost($postid)
    {
        $user = auth()->user(); 
     //    return $user;
     //    dd();
        $likesValue=Post::select('like_count')->where('post_id', $postid)->get();
        Post::where('post_id', $postid)->update(['like_count' => $likesValue[0]['like_count']-1]);
        Like::where('post_id', $postid)->where('user_id', $user->id)->delete();
        return $likesValue;
        return true;
    }
}
