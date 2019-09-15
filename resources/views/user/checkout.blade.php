@extends('layouts.master')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
@endsection
@section('style')
<style>
    .bg-ok{
        background: #4ad4307a ! important;
    }
</style>
@endsection
@section('content')
@php
if (Auth::check()) {
    $login=1;
}else{
    $login=0;
}

@endphp
<div class="row page-title">
            <div class="col-md-12">
                @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('errors'))
                            <p class="alert alert-danger">{{ Session::get('errors') }}</p>
                @endif
            </div>

            </div>

<div class="checkout-wrapper pt-10 pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <main id="primary" class="site-main">
                    <div class="user-actions-area">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                                <div id="accordion">
                                    <div class="card mt-20">
                                        <div class="card-header {{Auth::check()?'bg-ok':''}}" id="headingOne" >
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <h3>
                                                        @if(Auth::check())
                                                        <i class="fa fa-check-circle"></i>
                                                        @endif
                                                    1. Check Out Method</h3>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse {{Auth::check()?'d-none' : 'show'}}" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div  id="checkout_login" class="display-content" style="display: block;">
                                                    <div class="login-info">
                                                        <p class="login-text">If you have shopped with us before,
                                                            please enter your details in the boxes below. If you are a
                                                            new customer, please proceed to the Billing &amp; Shipping
                                                            section.</p>
                                                        <form action="{{route('checkout.login')}}" method="post" >
                                                            @csrf
                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="login_user">Email <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="email" name="email" class="form-control" id="login_user" required="">
                                                                </div>
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="login_pass">Password <span class="text-danger">*</span></label>
                                                                    <input type="password" name="password" class="form-control" id="login_pass"
                                                                        required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-row align-items-center mb-3">
                                                                <div class="form-group col-4 col-sm-2 col-md-2 col-lg-1">
                                                                    <button type="submit" class="btn btn-secondary">Continue</button>
                                                                </div>
                                                                <div class="form-group col-8 col-sm-10 col-md-10 col-lg-11">
                                                                </div>
                                                            </div>
                                                            
                                                            @if ($errors->has('password'))
                                                                <div class="form-group row">
                                                                    <div class="col-sm-9">
                                                                        <p style="color: red;"><strong>{{ $errors->first('password') }}</strong></p>
                                                                    </div>

                                                                </div>
                                                                    
                                                            @endif


                                                            <p class="lost-password">
                                                                <a href="{{ route('password.request') }}">Lost your password?</a>
                                                            </p>
                                                            {{-- {{Request::url()}} <br> {{request()->getHttpHost()}} --}}
                                                            <p class="lost-password">
                                                                <a data-toggle="collapse" data-target="#collapseTwo"
                                                                    aria-expanded="true" aria-controls="collapseTwo"
                                                                    href="#">Don't have account? <span class="badge badge-success"
                                                                        style="padding: 0.50em .4em;">Create Now!</span></a>
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-20">
                                        <div class="card-header {{Auth::check()?'bg-ok':''}}" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <h3>2. Your Address</h3>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse {{Auth::check()?'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="col-12 col-sm-12 col-md-12astasr col-lg-12">
                                                    <div class="checkout-form">
                                                        <div class="section-title left-aligned">
                                                            <h3>Billing Details</h3>
                                                        </div>
                                                        <form action="{{route('checkout.order')}}" method="post">
                                                            @csrf
                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="first_name">Full Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" class="form-control" id="first_name"
                                                                        required="" value="{{Auth::check()?Auth::user()->name : ''}}">
                                                                </div>
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="last_name">Email<span class="text-danger">*</span></label>
                                                                    <input type="email" name="email" class="form-control" id="last_name"
                                                                        required="" value="{{Auth::check()?Auth::user()->email : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="company_name">Phone Number  <span class="text-danger">*</span></label>
                                                                    <input type="text" name="phone" class="form-control" id="company_name" value="{{Auth::check()?Auth::user()->phone : ''}}" required="">
                                                                </div>

                                                                @if($login==0)
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="gender">Gender <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="gender" id="gender" class="form-control nice-select"
                                                                        required="" >
                                                                        <option value=""> --- Select --- </option>
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">other</option>
                                                                    </select>
                                                                </div>
                                                                @else
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="company_name">Alternate Phone Number</label>
                                                                    <input type="text" name="phone" class="form-control" id="company_name" value="{{Auth::check()?Auth::user()->alt_phone : ''}}">
                                                                </div>
                                                                @endif
                                                                
                                                            </div>
                                                            
                                                            

                                                            @if($login==0)
                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-12">
                                                                    <label for="p_address">Address <span class="text-danger">*</span></label>
                                                                    <textarea type="text" name="address" class="form-control" id="p_address"
                                                                        required=""></textarea>
                                                                </div>
                                                            </div>
                                                            @endif

                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-12">
                                                                    <label for="p_address">Shipping Address <span class="text-danger">*</span></label>
                                                                    <textarea type="text" name="shipping_address" class="form-control" id="p_address"
                                                                        required="">{{Auth::check()?Auth::user()->shipping_address : ''}}</textarea>
                                                                </div>
                                                            </div>




                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="city_name">City <span class="text-danger">*</span></label>
                                                                    <input type="text" name="city" class="form-control" id="city_name"
                                                                        required="" value="{{Auth::check()?Auth::user()->city : ''}}">
                                                                </div>
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="province_name">Postal Code <span class="text-danger">*</span></label>
                                                                    <input type="text" name="postal_code" class="form-control" id="province_name"
                                                                        required="" value="{{Auth::check()?Auth::user()->post_code : ''}}">
                                                                </div>
                                                            </div>

                                                            @if($login== 0)

                                                            <div class="form-row mb-3">
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for="zip_code">Password <span class="text-danger">*</span></label>
                                                                    <input type="password" name="password" class="form-control" id=""
                                                                        required="">
                                                                </div>
                                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                                    <label for=""  class="d-block">Password Confirm
                                                                        <span class="text-danger">*</span></label>
                                                                    <input  name="password_confirmation" type="password" class="form-control" id="password_confirmation"
                                                                        required="">

                                                                    


                                                                    
                                                                </div>
                                                            </div>

                                                            @endif

                                                            <div class="form-row">
                                                                <div class="form-group col-12 col-sm-12 col-md-12">
                                                                    <label for="order_notes">Order Notes</label>
                                                                    <textarea class="form-control" id="order_notes"
                                                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-row align-items-center mb-3">
                                                                <div class="form-group col-4 col-sm-2 col-md-2 col-lg-1">
                                                                    <button style="display: {{Auth::check()?'none':''}};" type="submit" class="btn btn-secondary">Continue</button>
                                                                </div>
                                                                <a href="#" data-toggle="collapse" data-target="#collapseThree"
                                                                    aria-expanded="true" aria-controls="collapseThree" class=" btn btn-info btn-lg" style="display: {{!Auth::check()?'none':''}}">Continue</a>
                                                                <div class="form-group col-8 col-sm-10 col-md-10 col-lg-11">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div> <!-- end of checkout-form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-20">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    3. SHIPPING METHOD
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                @foreach(App\ShippingMethod::all() as $method)
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="method" id="exampleRadios1" value="{{$method->id}}">
                                                  <label class="form-check-label" for="exampleRadios1">
                                                    {{$method->name}}
                                                  </label>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-20">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    3. SHIPPING METHOD
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                @foreach(App\ShippingMethod::all() as $method)
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="method" id="exampleRadios1" value="{{$method->id}}">
                                                  <label class="form-check-label" for="exampleRadios1">
                                                    {{$method->name}}
                                                  </label>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                <div class="order-summary">
                                    <div class="section-title left-aligned">
                                        <h3>Your Order</h3>
                                    </div>
                                    <div class="product-container">
                                        <div class="product-list">
                                            <div class="product-inner media align-items-center">
                                                <div class="product-image mr-4 mr-sm-5 mr-md-4 mr-lg-5">
                                                    <a href="#">
                                                        <img src="assets/img/product/product-13.jpg" alt="Compete Track Tote"
                                                            title="Compete Track Tote">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Compete Track Tote</h5>
                                                    <p class="product-quantity">Quantity: 3</p>
                                                    <p class="product-final-price">$180.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-list">
                                            <div class="product-inner media align-items-center">
                                                <div class="product-image mr-4 mr-sm-5 mr-md-4 mr-lg-5">
                                                    <a href="#">
                                                        <img src="assets/img/product/product-4.jpg" alt="Rival Field Messenger 6"
                                                            title="Rival Field Messenger 6">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5>Rival Field Messenger 6</h5>
                                                    <p class="product-quantity">Quantity: 5</p>
                                                    <p class="product-final-price">$260.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end of product-container -->
                                    <div class="order-review">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td class="text-center">$440.00</td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td class="text-center"><strong>$440.00</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="checkout-payment">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="custom-radio">
                                                    <input class="form-check-input" type="radio" name="payment" id="check_payment"
                                                        value="check" checked="">
                                                    <span class="checkmark"></span>
                                                    <label class="form-check-label" for="check_payment">Check Payments</label>
                                                    <div class="payment-info" id="check_pay">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                                <div class="custom-radio">
                                                    <input class="form-check-input" type="radio" name="payment" id="cash_delivery_payment"
                                                        value="cash">
                                                    <span class="checkmark"></span>
                                                    <label class="form-check-label" for="cash_delivery_payment">Cash on
                                                        Delivery</label>
                                                    <div class="payment-info" id="cash_pay">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </div>
                                                <div class="custom-radio">
                                                    <input class="form-check-input" type="radio" name="payment" id="paypal_payment"
                                                        value="paypal">
                                                    <span class="checkmark"></span>
                                                    <label class="form-check-label" for="paypal_payment">PayPal Express
                                                        Checkout</label>
                                                    <div class="payment-info" id="paypal_pay">
                                                        <p>Pay via PayPal. You can pay with your credit card if you
                                                            don’t have a PayPal account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-check">
                                                    <div class="custom-checkbox">
                                                        <input class="form-check-input" type="checkbox" id="terms_acceptance"
                                                            required="">
                                                        <span class="checkmark"></span>
                                                        <label class="form-check-label" for="terms_acceptance">I agree
                                                            to the <a href="#">terms of service</a> and will adhere to
                                                            them unconditionally.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-end">
                                                <input type="submit" class="btn btn-secondary dark" value="Continue to Payment">
                                            </div>
                                        </form>
                                    </div> <!-- end of checkout-payment -->
                                </div> <!-- end of order-summary -->
                            </div>
                        </div> <!-- end of row -->
                    </div> <!-- end of user-actions -->
                    <!-- end of checkout-area -->
                </main> <!-- end of #primary -->
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection