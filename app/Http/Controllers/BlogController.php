<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getsingleblog($slug){
        $post = Post::where('slug', '=',$slug)->first();
        $post->increment('view');
        return view('blog.single')->withPost($post);
    }
}
