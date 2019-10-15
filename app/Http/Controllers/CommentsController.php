<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function Store(Request $request){
        $this->validate($request, [
            'body'=>'required'
            ]);
            $comment = new Comment;
            $comment->body =$request->input('body');
            $comment->user_id =auth()->user()->id;
            $post=Post::find($request->post_id);
            $comment->post_id =$post->id;
            $comment->save();
        return redirect()->route('posts.show',$post->id);
    }
}
