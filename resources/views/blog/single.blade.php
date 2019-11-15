@extends('app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by morgan')
@section('head')


@endsection
@section('content')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
     
        <hr>
          <div class="clearfix">
        
<h1>{{$post->title}}</h1>


<img style="width:50%" src="{{asset('/')}}storage/images/{{$post->image}}"><br>

<div>
{!!htmlspecialchars_decode($post->body)!!}</div>
<hr>
<small>Posted In {{$post->category->name}}</small>
<small>Written on {{$post->created_at->diffForHumans()}} by
 {{$post->user->name}}
 </small>
<hr>

      
         
{!! Form::open(['route'=>['comments.store', $post->id],'method'=> 'POST','class' =>'pull-left'])!!}
     <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body', '', ['id'=>'editor','class'=>'form-control','placeholder' =>'Comment'])}}
    {{Form::hidden('post_id',$post->id)}}
    </div>
  <div>
    {!! Form::submit('submit', ['class'=>'btn btn-success']) !!}
{!! Form::close()!!}

@forelse ($post->comments as $comment)
Comment:<p>{!! htmlspecialchars_decode($comment->body)!!}<br>
  created on {{$comment->created_at->diffForHumans()}}</p>

@empty
<p>This post has no comments</p>
@endforelse

<span>{{$post->comments->count()}}<i class="fa fa-comments"></i> </span>

<span>{{$post->view}}<i class="fa fa-eye"></i> </span>
        </div>
      </div>
    </div>
  </div>

  <hr>
  
 

@endsection