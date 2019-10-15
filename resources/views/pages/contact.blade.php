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
      
<h1>Contact Me</h1>
{!! Form::open(['action'=>'PagesController@postcontact', 'method'=> 'POST'])!!}

    <div class="form-group">
    {{Form::label('email','Email')}}
    {{Form::text('email', '', ['class'=>'form-control','placeholder' =>'Email'])}}
    </div>
     <div class="form-group">
    {{Form::label('subject','Subject')}}
    {{Form::text('subject', '', ['class'=>'form-control','placeholder' =>'Subject'])}}
    </div>
    <div class="form-group">
    {{Form::label('message','Message')}}
    {{Form::textarea('message', '', ['id'=>'editor','class'=>'form-control','placeholder' =>'Type your message here.....'])}}
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

