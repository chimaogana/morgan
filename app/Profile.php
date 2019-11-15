<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $guarded =[];

    public function profileImage()
    {
    	$imagePath = ($this->image) ? $this->image : 'profile/MYtWmqJwoyhXbUbN8mIc8yqeK5TsyxZm8CSP7iRQ.jpeg';
    	return "storage/". $imagePath;
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
