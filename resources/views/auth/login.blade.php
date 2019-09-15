@extends('layouts.master')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
@endsection
@section('style')
<style>
.bg-color{
background-color: #fedc19;
}
</style>
@endsection
@section('content')
<style>
.bg-color{
background-color: #fedc19;
width: 40px;
}
.required{
color: red;
}
label{
font-size: small;
font-weight: bold;
}
.custom-checkbox .custom-control-label::before {
    border-radius: .25rem;
    background: #1c88fd;
}
</style>
<div class="container">
    <div class="row mt-30 mb-50">      
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="animated rotateInDownRight  card" style="background-color: #e8e8e8;">
                <div class="card-body">
                    <h2 style="color: #debd00;" class="card-title" align="center">Login</h2>
                    <form class="form-horizontal pt-20" action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"><label for="exampleInputuname3" class="control-label ">Email <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-user"></i></span></div>
                                    <input name="email" type="email" class="form-control" id="exampleInputuname3" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail3" class=" control-label">Password <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-envelope-o"></i></span></div>
                                    <input name="password" type="password" class="form-control" id="exampleInputEmail3" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <label class="custom-control custom-checkbox m-b-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Check me out !</span>
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <p style="color: red;"><strong>{{ $errors->first('email') }}</strong></p>
                        </div>

                    </div>
                        
                     @endif

                    <div class="form-group row m-b-0">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="">
                                <button type="submit"  class="btn  btn-block waves-effect waves-light theme-bg">Login</button>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <p align="center"><a href="{{ route('password.request') }}">Forgot password?</a></p>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <a href="{{ url('/login/facebook') }}" style="background-color: #4267B2; color: white;" class="btn btn-block"><span style="font-size: 14px;">Log In with Facebook</span> <i class="fa fa-facebook-official "></i></a>
                            <a href="{{ url('/login/google') }}" style="background-color: #C71610; color: white;" class="btn btn-block"><span style="font-size: 14px;">Log In with Google</span> <i class="fa fa-google"></i></a>
                            
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
</div>
@endsection