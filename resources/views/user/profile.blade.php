@extends('layouts.master')
@section('link')
{{-- <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
@endsection

@section('content')
<style>
    th, td {
    white-space: nowrap;
}
.required{
    color: red;
}

/*.nav-tabs {
    border-bottom: 1px solid #dee2e6;
    background: white;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    color: #495057;
    
    border-color: #dee2e6 #dee2e6 #e8e8e8;
}*/
</style>
<div class="container">
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
    <div class="row mt-20 mb-20">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card" style="">
                            <div class="card-body">
                                <center class="m-t-30">
                                @if(Auth::user()->provider == NULL || Auth::user()->provider == '')
                                <img src="{{asset('images/profile/'.Auth::user()->image)}}" class="img-circle" width="150">
                                @else
                                
                                <img src="{{Auth::user()->image}}" class="img-circle" width="150">
                                @endif
                                 
                                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                    <h6 class="card-subtitle"></h6>
                                    
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{Auth::user()->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{Auth::user()->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{Auth::user()->address}}</h6><small class="text-muted p-t-30 db"></small>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card" style="">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="false">Orders</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#earnings" role="tab" aria-selected="false">Earnings</a> </li>
                                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Offers / Coupon</a> </li>
                                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#settings" role="tab" aria-selected="true">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel" >
                                    <h3 style="text-align: center;">My Orders</h3>
                                    <div class="table-responsive" style="margin-top: 20px; padding: 5px;">

                                         <table style="" id="example" class="table m-t-40" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice Id</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Tracking Number</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td><a href="{{route('invoice.show',$order->id)}}">#INV0000{{$order->id}}</a></td>
                                                <td>{{$order->created_at->format('d M, Y')}}</td>
                                                <td><span class="badge" style="background-color: {{isset($order->orderStatus->color) ? $order->orderStatus->color :'#fedc19'}}"> {{isset($order->orderStatus->name)?$order->orderStatus->name :'Processing'}}</span>
                                                </td>
                                                <td>{{$order->order_tracking_number}}</td>
                                                <td>{{$order->total_after_shipping}} Taka</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                   
                                </div>

                                <div class="tab-pane " id="earnings" role="tabpanel" style="padding: 20px;">
                                    @include('user.earnings')
                                   
                                </div>
                                <!--second tab-->
                                <div class="tab-pane show" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <h3 style="text-align: center;">My Coupons</h3>
                                    <div class="table-responsive" style=" padding: 5px;">

                                         <table style="" id="example1" class="table m-t-40" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Coupon</th>
                                                 <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($usedCoupons as $coupon)
                                            <tr>
                                                <td>
                                                    {{$coupon->coupon_code}}
                                                </td>
                                                <td><span class="badge badge-danger">Used</span></td>
                                            </tr>
                                            @empty
                                            
                                            @endforelse
                                        </tbody>
                                    </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane show" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" action="{{route('users.update',Auth::user()->id)}}" class="form-horizontal form-material">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input name="name" type="text" placeholder="Johnathan Doe" class="form-control form-control-line" value="{{Auth::user()->name}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="email" name="email" placeholder="" class="form-control form-control-line" name="example-email" id="example-email" value="{{Auth::user()->email}}" required="">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <input name="phone" type="text" placeholder="" class="form-control form-control-line" value="{{Auth::user()->phone}}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Altr Phone No</label>
                                                <div class="col-md-12">
                                                    <input name="altr_phone" type="text" placeholder="" class="form-control form-control-line" value="{{Auth::user()->alt_phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <textarea required="" name="address" rows="3" class="form-control form-control-line">{{Auth::user()->address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Shipping Address <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <textarea required="" name="shipping_address" rows="3" class="form-control form-control-line">{{Auth::user()->shipping_address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">City <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <input required="" name="city" type="text" placeholder="123 456 7890" class="form-control form-control-line" value="{{Auth::user()->city}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Postal Code <span class="required">*</span></label>
                                                <div class="col-md-12">
                                                    <input name="postalCode" type="text" placeholder="" class="form-control form-control-line" value="{{Auth::user()->post_code}}" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Profile Picture</label>
                                                <div class="col-md-12">
                                                    <input name="image" type="file" placeholder="" class="form-control form-control-line" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-12">Note</label>
                                                <div class="col-md-12">
                                                    <textarea name="note" rows="5" class="form-control form-control-line">{{Auth::user()->note}}</textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "autoWidth": true,
    });
} );
</script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "autoWidth": true,
        });
    });

    $(document).ready(function() {
        $('#example3').DataTable({
            "autoWidth": true,
        });
    });
</script>
@endsection