<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    // those file is changable ou updatable;
    protected $fillable = [
        'post_text',
        'post_img',
        'like_count',
    ];

    // protected $table = "posts";
    // protected $primaryKey = "post_id";

    // public function likes(){
    //     return $this->hasMany(Like::class, 'post_id');
    // }

    // public function isLikedBy($user){
    //     return $this->likes()->where('user_id', $user->id)->exists();
    // }

}
