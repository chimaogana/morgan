@extends('app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by morgan')
@section('head')


@endsection
@section('content')

<div class="container">
    <div class="row">
      <div class="col-sm-4">
              <h1>Posts</h1>
	@if(count($posts)>0)
	@foreach($posts as $post)
      
<h1>{{$post->title}}</h1>
<img style="width:50%" src="{{asset('/')}}storage/images/{{$post->image}}">
	<h3><a href="{{asset('/')}}posts/{{$post->id}}">{{$post->title}}</a>
  {!!htmlspecialchars_decode($post->body)!!}</h3>
	<small>Written on {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>@endforeach







  <!-- Main Content -->
  {{-- <div class="container">
    <div class="row">
      <div class="col-sm-4">
          
        <h1>Posts</h1>
	@if(count($posts)>0)
	@foreach($posts as $post)

        </div>
      </div>
    </div>
   --}}

  
  
	
	{{$posts->links()}}
	@else
	<p>No Posts found</p>
	@endif
</div></div></div>
@endsection