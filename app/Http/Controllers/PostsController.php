<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{

    public function __construct()
    {
        
        
        
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=Post::where('user_id','=',auth()->user()->id)->paginate(5);
        // $posts=Post::orderBy('created_at','desc')->paginate(10);
       
        
        // dd($posts->user_id);
        // dd($posts);
        $posts=Post::where('approved' ,'1', 'desc')
                    ->orderBy('created_at','desc')
                    ->paginate(3);

        
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        // $this->authorize('view', Post::class);
        // $post= Post::All();
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        return redirect('posts')->with('success','Awaiting for admin approval');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('image')){
            $post->image =$fileNameToStore;
                    }
        $post->save();

        return redirect('posts')->with('success', 'Posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('posts')->with('error','Unauthorise Page');
        // }

        Post::where('id',$id)->delete();
        return redirect(route('posts.index'));
    }


    public function getPost(){
        // $this->authorize('viewAny', Post::class);
        $posts=Post::orderBy('created_at','desc')->paginate(2) ;
        return view('posts/approved',compact('posts'));
    }



    public function approved($id){
        $post = Post::find($id);
               
        $post->approved = 1;
        
        $post->save();

    
        return redirect(route('posts.index'))->with('success', 'Admin approved');
    }
    
    public function PostbyID($id){

        $posts=Post::where('user_id','=',auth()->user()->id)->paginate(5);

        return view('posts/single',compact('posts'));
       
    }
}
