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
$subtotal=0;
@endphp

<style>
    .checkout-wrapper .display-content {
    border: unset; 
    display: none;
    margin-bottom: 30px;
    padding: 20px;
    border-radius: unset; 
}
.notify-badge{
        position: absolute;
    left: -20px;
    top: -10px;
    background: #00d874;
    text-align: center;
    border-radius: 30px 30px 30px 30px;
    color: white;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: bolder;
}
.item{
    position:relative;
    /*padding-top:20px;*/
    display:inline-block;
    width: 100%;
}
</style>
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
        <h1 class="bg-info" style="text-align: center;color: white;font-size: 35px;"><small> {{Cart::count()<1 ? 'Your cart is empty. Please select some product first!':'5 Easy Step! Then We will run to you!!'}}</small></h1><br>
        <div class="row" style="{{Cart::count()<1 ?'display:none;':''}}">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <main id="primary" class="site-main">
                    <div class="user-actions-area">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="item">
                                    <span class="notify-badge">1</span>
                                    <h3 style="background:#00d874;text-align: center;">Login<small>(Not a member? Then Skip!)</small> </h3>
                                </div>
                                
                                <div id="checkout_login" class="display-content" style="display: block; {{Auth::check()?'pointer-events: none;background: #cacaca;':''}}background-color: #efefef;">
                                    <div class="login-info">

                                        <form action="{{route('checkout.login')}}" method="post">
                                            @csrf
                                            <div class="form-row mb-3">
                                                <div class="form-group col-12 col-sm-12 col-md-12">
                                                    <label for="login_user">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control" id="login_user"
                                                        required="">
                                                </div>
                                                <div class="form-group col-12 col-sm-12 col-md-12">
                                                    <label for="login_pass">Password <span class="text-danger">*</span></label>
                                                    <input type="password" name="password" class="form-control" id="login_pass"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="form-row align-items-center mb-3">
                                                <div class="form-group col-4 col-sm-2 col-md-2 col-lg-1">
                                                    <button type="submit" class="btn btn-secondary">Login</button>
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
                                        </form>
                                        @if(Auth::check())
                                        @else
                                        <a href="{{ url('/login/facebook') }}" style="background-color: #4267B2; color: white;" class="btn btn-block"><span style="font-size: 14px;">Log In with Facebook</span> <i class="fa fa-facebook-official "></i></a>
                                            <a href="{{ url('/login/google') }}" style="background-color: #C71610; color: white;" class="btn btn-block"><span style="font-size: 14px;">Log In with Google</span> <i class="fa fa-google"></i></a>
                                        @endif
                            
                                    </div>
                                </div>
                                
                                <div class="item">
                                    <span class="notify-badge">3</span>
                                    <h3 style="background:#00d874; text-align: center;">Coupon Code</h3>
                                </div>
                                
                                <div id="checkout_login" class="display-content" style="display: block;background-color: #efefef;">
                                    <div class="login-info">
                                        <p>Enter coupon code to get spcial discount.</p><br>
                                        <div class="form-row mb-3">
                                            <form id="couponVerify" action="{{route('coupon.verify')}}" method="post">
                                            @csrf
                                            <div class="form-group col-12 col-sm-12 col-md-12">
                                                <input {{Cart::count()<1 ? 'disabled':''}} type="text" name="coupon" class="form-control" id="couponInput"
                                                    required=""><br>
                                                <button id="couponApplyBtn" type="submit" class="btn btn-secondary" style="text-align: center;">Apply
                                                </button>
                                                <div id="couponResult"></div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <form action="{{route('checkout.order')}}" method="post">
                                <div class="item">
                                    <span class="notify-badge">2</span>
                                     <h3 style="background:#00d874; text-align: center;">Billing Information</h3>
                                </div>
                               
                                <div  id="checkout_login" class="display-content" style="display: block;background: #efefef;">
                                    <div class="login-info">
                                        
                                            @csrf
                                            @if(!Auth::check())
                                            <div class="checkbox form-row mb-3">
                                              <label><input type="checkbox" value="" checked="">Registration</label>
                                            </div>
                                            @endif

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
                                                    <input type="text" name="phone" class="form-control" id="company_name"
                                                        value="{{Auth::check()?Auth::user()->phone : ''}}" required="">
                                                </div>

                                                @if($login==0)
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="gender">Referal Number <span class="text-danger">*</span></label>
                                                    <input type="text" name="refer_number" required class="form-control">
                                                </div>
                                                @else
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="company_name">Altr. Phone Number</label>
                                                    <input type="text" name="altr_phone" class="form-control" id="company_name"
                                                        value="{{Auth::check()?Auth::user()->alt_phone : ''}}">
                                                </div>
                                                @endif

                                            </div>



                                           
                                            <div class="form-row mb-3">

                                                 @if($login==0)
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="p_address">Address <span class="text-danger">*</span></label>
                                                    <textarea type="text" name="address" class="form-control" id="p_address"
                                                        required=""></textarea>
                                                </div>
                                                 @endif

                                                <div class="form-group col-12 col-sm-12 col-md-{{$login!=0?'12':'6'}}">
                                                    <label for="p_address">Shipping Address <span class="text-danger">*</span></label>
                                                    <textarea type="text" name="shipping_address" class="form-control"
                                                        id="p_address" required="">{{Auth::check()?Auth::user()->shipping_address : ''}}</textarea>
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
                                                    <label for="" class="d-block">Password Confirm
                                                        <span class="text-danger">*</span></label>
                                                    <input name="password_confirmation" type="password" class="form-control"
                                                        id="password_confirmation" required="">
                                                </div>
                                            </div>

                                            @endif

                                            <div class="form-row">
                                                <div class="form-group col-12 col-sm-12 col-md-6">
                                                    <label for="order_notes">Order Notes</label>
                                                    <textarea class="form-control" id="order_notes" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                                <input type="hidden" name="couponCode" id="couponCode">
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="item">
                                    <span class="notify-badge">4</span>
                                     <h3 style="background: #00d874; text-align: center;">Shipping Method</h3>
                                </div>
                                
                                <div class="card-body" style="background: #efefef;">
                                    @foreach(App\ShippingMethod::all() as $method)
                                    <div class="form-check">
                                        <input required class="form-check-input pMethod" type="radio" name="method" 
                                            value="{{$method->id}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}} ({{$method->cost}}tk)
                                        </label>
                                    </div>
                                    @endforeach

                                </div>


                                
                                <div class="item">
                                    <span class="notify-badge">5</span>
                                     <h3 style="background:#00d874; text-align: center;">Payment Method</h3>
                                </div>
                                <div class="card-body" style="background: #efefef;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="exampleRadios1"
                                            value="COD" required>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <span style="text-align: center;">Cash On Delivery </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 table-responsive" >
                                <h3 style="background:#00d874; text-align: center;">Order Summery</h3>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Vat</th>
                                            <th scope="col">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $index=> $product)
                                        
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{$product->name}}  | 
                                                @if($product->options->size)
                                                <span>Size: {{$product->options->size}} |</span>
                                                @endif
                                                @if($product->options->color)
                                                <span>Color: {{$product->options->color}}</span>
                                                @endif
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->qty}}</td>
                                            <td>
                                                @if($product->options->vat)
                                                {{$product->options->vat}} %
                                                @else
                                                0.00
                                                @endif
                                            </td>
                                            @php
                                            $subtotal+=($product->qty*$product->price)-($product->qty*$product->price*$product->options->vat)/100;
                                            @endphp
                                            <td style="text-align: right;">{{($product->qty*$product->price)-($product->qty*$product->price*$product->options->vat)/100}}</td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td style="border: unset;" colspan="4"></td>
                                            <th>Sub-Total</th>
                                            <th style="text-align: right;">{{$subtotal}}</th>
                                            <input type="hidden" name="total_after_vat" value="{{$subtotal}}">

                                        </tr>
                                        <tr id="appendable">
                                            <td style="border: unset;" colspan="6"></td>
                                        </tr>
                                        <tr id="appendableShipping">
                                            <td style="border: unset;" colspan="4"></td>
                                            <th>Total</th>
                                            <th style="text-align: right;" id="totalAfterDiscount">{{$subtotal}}</th>
                                            <input type="hidden" name="total_after_discount" id="total_after_discount">

                                        </tr>
                                        <tr >
                                            <td style="border: unset;" colspan="4"></td>
                                            <th>Grand Total</th>
                                            <th style="text-align: right;" id="grandTotal">{{$subtotal}}</th>
                                            <input type="hidden" name="total_after_shipping" id="total_after_shipping">

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info btn-block" {{Cart::count()<1 ? 'disabled':''}}>{{Cart::count()<1 ? 'Your Cart is empty':' Confirm Order'}}</button>
                        </form>
                </main> 
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection

@section('script')

<script>
$("#couponVerify").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var cartTotal={{$subtotal}};
    cartTotal.toFixed();

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       type: "POST",
       url: url,
       data: form.serialize(), // serializes the form's elements.
       success: function(data)
       {


        if (data.accept) {
            $('#couponCode').val(data.row.coupon_code);
            $('#couponResult').html('');
            $('#couponResult').append('<br /><div class="alert alert-success"><strong>Success!</strong> Coupon discount Added.</div>');
             $("#couponApplyBtn").attr("disabled","disabled");
             $("#couponInput").attr("readonly","readonly");
            var discountValue=((cartTotal*data.row.discount)/100).toFixed();
            var totalAfterDiscount=(cartTotal-discountValue).toFixed();
            $('#couponTd').remove();
            $('#appendable').after('<tr id="couponTd"><td style="border: unset;" colspan="4"></td><th>Coupon Offer</th><th style="text-align: right;"> -'+discountValue+'</th></tr>');

            $("#totalAfterDiscount").text("");
            $("#totalAfterDiscount").text(totalAfterDiscount);
            $("#totalAfterDiscount").val(totalAfterDiscount);
            $("#total_after_discount").val(totalAfterDiscount);

            var grandTotalcheck=$("#grandTotal").text();
            if (grandTotalcheck=='' || grandTotalcheck==0) {
                $("#grandTotal").text("");
                $("#grandTotal").text(totalAfterDiscount);
                $("#total_after_shipping").val(totalAfterDiscount);
            }else{
                
                grandTotalcheck= parseInt(grandTotalcheck);
                grandTotalcheck=grandTotalcheck-discountValue;
                $("#grandTotal").text(grandTotalcheck);
                $("#total_after_shipping").val(grandTotalcheck);
            }
            

            // alert(data.row.id);
        }else{
            $('#couponResult').html('');
            $('#couponResult').append('<br /><div class="alert alert-danger"><strong>Error!</strong> Enter a valid coupon.</div>');
        }
            
       }
    });

});


$('.pMethod').on('change', function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var value = $(this).val();


    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       type: "GET",
       url: 'shipping/method/'+value,
       data:  value,
       success: function(data)
       {
        var subtotal={{$subtotal}}
        var totalAfterDiscount=$("#totalAfterDiscount").val();
        if (totalAfterDiscount==0 || totalAfterDiscount=='') {
            var totalAfterShipping=subtotal+data.cost;
            $("#total_after_discount").val(subtotal);
        }else{
            console.log(totalAfterDiscount);
            var totalAfterShipping=parseInt(totalAfterDiscount)+data.cost;
        }
        
        
        
        $('#shippingId').remove();
        $('#appendableShipping').after('<tr id="shippingId"><td style="border: unset;" colspan="4"></td><th>Shipping Charge <small><p>('+data.name+')</p></small></th><th style="text-align: right;"> + '+data.cost+'</th></tr>');

        $("#grandTotal").text("");
        $("#grandTotal").text(totalAfterShipping);
        $("#total_after_shipping").val(totalAfterShipping);

            // show response from the php script.$('.editVehicle').on('click', function() {
       }
    });

});
</script>
<script>
    function successRedi(){
        swal({
          title: "Good job!",
          text: "You clicked the button!",
          icon: "success",
          button: "Aww yiss!",
        });
    }
</script>
@endsection