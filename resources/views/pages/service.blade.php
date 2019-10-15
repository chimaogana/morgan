@extends('app')

@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by chima')
@section('head')
@section('content')
<h1>{{$title}}</h1>

@if(count($services)>0)<ul class="list-group">
 @foreach($services as $service)
 
 	<li class="list-group-item">{{$service}}</li>
 
@endforeach</ul>
@endif
   @endsection
