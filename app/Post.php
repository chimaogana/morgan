<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{


    // protected $table =['posts'];
    protected $fillable= [ 'title','body','image','category_id','user_id'

];
    


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasmany('App\Comment');
    }
    public function category(){
        return $this->belongsTo('App\category');
    }
}
