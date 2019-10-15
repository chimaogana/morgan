<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class ApprovedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $posts=Post::all();
        return view('/approved/index', compact('posts'));
    }



    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'image'=> 'image|nullable|max:1999']);
if($request->hasFile('image')){
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extention =$request->file('image')->getClientOriginalExtension();
                $fileNameToStore=$filename.'_'.time().'.'.$extention;
                $path =$request->file('image')->storeAS('public/images',$fileNameToStore);
                    }else{
                        $fileNameToStore ='noimage.jpg';
                    }
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        
        $post->image = $fileNameToStore;
        $post->save();
        return redirect(route('post.index',)->with('success','Admin approved'));
    }
}
