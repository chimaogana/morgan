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
<p>{{$post->category->name}}</p>
<h1>{{$post->title}}</h1>
{{-- <h1><a href=""{{ url('blog/'.$post->slug)}}>{{url('blog/'.$post->slug)}}</a></h1> --}}

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

{{-- @include('includes.errors') --}}





       
          <!-- Pager -->
      
         
        </div>
      </div>
    </div>
  </div>

  <hr>
  
 

@endsection