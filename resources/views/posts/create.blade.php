@extends('app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by chima')
@section('head')


@endsection
@section('content')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
     
        <hr>
      
<h1>Create Post</h1>
{!! Form::open(['action'=>'PostsController@store', 'method'=> 'POST', 'enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title', '', ['class'=>'form-control','placeholder' =>'Title'])}}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body', '', ['id'=>'editor','class'=>'form-control','placeholder' =>'Body'])}}
    </div>
    <div class="form-group">
    {{Form::file('image')}}
    </div>
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
{!! Form::close()!!}

        
        <!-- Pager -->
        <div class="clearfix">
         
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection

