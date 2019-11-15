@extends('app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by morgan')
@section('head')


@endsection
@section('content')


    <div class="row">
      <div class="col-md-8">
      <h1>Categories</h1>
      <table class="table"><thead>
      <tr>
      <th>#</th>
      <th>name</th></tr>
      @foreach ( $categories as $category )
          <tbody><tr><th>{{$category->id}}</th>
      <td>{{$category->name}}</td>
          </tr>
      @endforeach</thead></table>
      
</div></div>
<div class="col-md-3">
<div class="well">
{!! Form::open(['route '=> 'categories.store','method' =>'POST']) !!}
<h2>New Category</h2>
{{ Form::label('name', 'Name:')}}
{{ Form::text('name', null, ['class' =>'form-control']) }}
{{ Form::submit('Create New Category',['class'=>'btn btn-primary'])}}
{!!  Form::close()!!}
 
</div></div>
@endsection