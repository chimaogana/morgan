<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PagesController extends Controller
{
    public function index(){

        $title= 'Welcome To Laravel';
          return view('pages.index')->with('title', $title);
  
      }
  
  
      public function about(){
          $title= 'About us';
          return  view('pages.about')->with('title',$title);
      }
  
      public function service(){
          $data = array(
              'title'=>'Services',
          'services'=>['Wed design','Programming','SEO']);
          return view('pages.service')->with($data);
      }
      public function getcontact(){
          return view('pages/contact');
      }
      public function postcontact(Request $request){
          $this->validate($request,
          ['email'=>'required|email',
          'subject'=>'min:3',
          'message'=>'min:10']); 
          $data = array(
              'email' => $request->email,
              'subject' =>$request->subject,
              'bodyMessage' =>$request->message
          );    
          Mail::send('emails.contact ', $data, function($message) use ($data){
              $message->from($data['email']);
              $message->to('morgan.ogana.c@gmail.com');
              $message->subject($data['subject']);

          });
      }
}
