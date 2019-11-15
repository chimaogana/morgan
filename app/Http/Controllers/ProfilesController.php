<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Auth;
use App\Profile;

class ProfilesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

public function profile(){

    
    
    return view('profiles.profile');
}
public function addprofile(Request $request){
    
    $this->validate($request,[
    'name'=> 'required',
    'email'=>'required',
    'phone_no'=>'required|max:11', 
    'image'=> 'image|nullable|max:1999',

    ]);
    if($request->hasFile('image')){
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extention =$request->file('image')->getClientOriginalExtension();
        $fileNameToStore=$filename.'_'.time().'.'.$extention;
        $path =$request->file('image')->storeAS('public/profile',$fileNameToStore);
            }else{
                $fileNameToStore ='noimage.jpg';
            }
    $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->user_id = Auth::user()->id;
        $profile->email = $request->input('email');
        $profile->phone_no =$request->input('phone_no');
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $file->storeAs('public/profile/', $file->getClientOriginalName());
        //     // $url = URL::to('/') . '/profile/'. $file->getClientOriginalName();
            
        
        $profile->image = $fileNameToStore;
        $profile->save();
        return redirect('profiles/profile')->with('success', 'Profile Added successfully');

// return redirect("profile/{$user->id}");
// }
}


}