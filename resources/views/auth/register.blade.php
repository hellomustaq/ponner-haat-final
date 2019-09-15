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
</style>
<div class="container">
<div class="col-md-12">
@if ($errors->any())
<br>
    <ul style="background-color: #f7c6c6; border-radius: 5px;">{!! implode('', $errors->all('<li  align="center" style="color:red;">:message</li>')) !!}</ul>
@endif
</div>

<div class="row mt-30 mb-50">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="animated rotateInDownLeft  card" style="background-color: #e8e8e8;">
            <div class="card-body">
                <h2  class="card-title" align="center">Register</h2>
                <form class="form-horizontal pt-20" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6"><label for="exampleInputuname3" class="control-label ">Full Name  <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-user"></i></span></div>
                                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleInputuname3" placeholder="Full Name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail3" class=" control-label">Email <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-envelope-o"></i></span></div>
                                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail3" placeholder="Enter email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="web" class=" control-label">Phone</label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-phone"></i></span></div>
                                    <input name="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="web" placeholder="" required="" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Gender <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-transgender"></i></span></div>
                                    <select name="gender" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" id="exampleInputpwd5" required="">
                                        <option selected="">Choose an option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="inputPassword4" class="control-label">Password <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-lock"></i></span></div>
                                    <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputpwd4" placeholder="Enter pwd" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Re Password <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-lock"></i></span></div>
                                    <input name="password_confirmation" type="password" class="form-control" id="exampleInputpwd4" placeholder="Re Enter pwd" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Address <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-address-card"></i></span></div>
                                    <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="" cols="30" rows="2" required="">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="control-label">Shipping Address <span class="required"></span></label>
                        <div class="">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-address-card"></i></span></div>
                                <textarea name="shippingAddress" class="form-control" id="shippingAddress" cols="30" rows="2">{{ old('shippingAddress') }}</textarea>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">City</label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-home"></i></span></div>
                                    <input name="city" type="text" class="form-control" id="exampleInputpwd5" placeholder="" value="{{ old('city') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Country  <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-home"></i></span></div>
                                    <input name="country" type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" id="exampleInputpwd5" placeholder="" required="" value="{{ old('country') }}">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Postal Code  <span class="required">*</span></label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-inbox"></i></span></div>
                                    <input name="postalCode" type="text" class="form-control {{ $errors->has('postalCode') ? ' is-invalid' : '' }}" id="exampleInputpwd5" placeholder="" required="" value="{{ old('postalCode') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class=" control-label">Profile Picture</label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-color"><i class="fa fa-picture-o"></i></span></div>
                                    <input name="propic" type="file" class="form-control" id="exampleInputpwd5" placeholder="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group row m-b-0 mt-50">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="">
                                <button type="submit" class="btn  btn-block waves-effect waves-light theme-bg">Register</button>
                            </div>
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