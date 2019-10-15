<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approved extends Model
{
    protected $fillable= [ 'title','body','image'];
    public function post(){
        return $this->hasOne('App\Post');
    }
}
