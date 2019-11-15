@extends('app')
@section('bg-img',asset('users/img/contact-bg.jpg'))
@section('title','Add Profile')
@section('sub-title','')
@section('content')

  <!-- Main Content -->
  
      
        
@include('inc.messages')
                <div class="card-body">
                    
 <form method="POST" action="{{route('addprofile')}}" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{auth()->user()->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    
                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone_Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="phone_no" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus>

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                          <div class="form-group row"><div class="col-8 offset-2">

                            <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                         @error('image')
                
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
    </div></div>

                        
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Profile') }}
                                </button>
                                 
                            </div>
                        </div>
                    </form>
                </div>
      
    </div>
  </div>

  <hr>
@endsection
