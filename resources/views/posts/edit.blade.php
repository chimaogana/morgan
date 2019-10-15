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
       
        
        <!-- Pager -->
        <div class="clearfix">
  



<h1>Edit Post</h1>
{!! Form::open(['action'=>['PostsController@update', $posts->id ],'method'=> 'POST', 'enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title', $posts->title, ['class'=>'form-control','placeholder' =>'Title'])}}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body', $posts->body, ['id'=>'editor','class'=>'form-control','placeholder' =>'Body'])}}
    </div>
     <div class="form-group">
    {{Form::file('image')}}
    </div> 
    {{Form::hidden('_method','PUT')}}
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
{!! Form::close()!!}

         
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection

