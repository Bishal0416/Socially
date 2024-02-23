<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // those file is changable ou updatable;
    protected $fillable = [
        'post_text',
        'post_img',
    ];

    protected $table = "posts";
    protected $primaryKey = "post_id";

}
