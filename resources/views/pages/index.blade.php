
@extends('app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by mogran')
@section('head')
@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to skooleeo blog</h1>
    <p>This is the crud application </p>
    {{-- <p><a class="btn btn-primary btn-lg" href="{{ asset('/login') }}" role="button">Login</a> <a class="btn btn-success btn-lg" href="{{ asset('/register')}}" role="button">Register</a></p> --}}
</div>    @endsection
   