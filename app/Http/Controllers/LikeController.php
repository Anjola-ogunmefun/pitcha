<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        //
       
    }

    public function create(post $post)
    {
        dd($post);
       $likes = Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id(),
        ]);

     return $likes;

    }
}
