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
        <a href="{{asset('/posts')}}" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>
<img style="width:50%" src="{{asset('/')}}storage/images/{{$post->image}}"><br>

<div>
{!!htmlspecialchars_decode($post->body)!!}</div>
<hr>
<small>Written on {{$post->created_at->diffForHumans()}} by
 {{$post->user->name}}
 </small>
<hr>
@if(!Auth::guest())
@if(auth()->user()->id == $post->user_id)
<a href="{{$post->id}}/edit" class="btn btn-default">Edit</a>


{!! Form::open(['action'=>['PostsController@destroy', $post->id ],'method'=> 'POST','class' =>'pull-left'])!!}
    
    {{Form::hidden('_method','DELETE')}}
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
{!! Form::close()!!}
@endif @endif
@if(Auth::check())
{{-- @include('includes.errors') --}}
{!! Form::open(['route'=>['comments.store'],'method'=> 'POST','class' =>'pull-left'])!!}
     <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body', '', ['id'=>'editor','class'=>'form-control','placeholder' =>'Comment'])}}
    {{Form::hidden('post_id',$post->id)}}
    </div>
  <div>
    {!! Form::submit('submit', ['class'=>'btn btn-success']) !!}
{!! Form::close()!!}
@endif
@forelse ($post->comments as $comment)
Comment:<p>{{ $comment->body}}<br>
by:{{$comment->user->name}} <br> created on {{$comment->created_at->diffForHumans()}}</p>

@empty
<p>This post has no comments</p>
@endforelse
<span>{{$post->comments->count()}} </span>
    




       
          <!-- Pager -->
      
         
        </div>
      </div>
    </div>
  </div>

  <hr>
  
 

@endsection