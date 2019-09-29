@extends('admin.layouts.master')
@section('preloader')

@endsection
@section('content')

@php
$sum=0;
$orderSum=0;
foreach (App\Product::all() as $key => $product) {
    $sum+=$product->quantity* $product->purchase_price;
}
foreach (App\Order::all() as $key => $order) {
    $orderSum+=$order->total_after_shipping;
}
@endphp
<style>
    .weather-card {
  margin: 60px auto;
  height: 445px;
  width: 450px;
  background: #fff;
  box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
  overflow: hidden;
}
.weather-card .top {
  position: relative;
  height: 290px;
  width: 100%;
  overflow: hidden;
  background: url("https://s-media-cache-ak0.pinimg.com/564x/cf/1e/c4/cf1ec4b0c96e59657a46867a91bb0d1e.jpg") no-repeat;
  background-size: cover;
  background-position: center center;
  text-align: center;
}
.weather-card .top .wrapper {
  padding: 30px;
  position: relative;
  z-index: 1;
}
.weather-card .top .wrapper .mynav {
  height: 20px;
}
.weather-card .top .wrapper .mynav .lnr {
  color: #fff;
  font-size: 20px;
}
.weather-card .top .wrapper .mynav .lnr-chevron-left {
  display: inline-block;
  float: left;
}
.weather-card .top .wrapper .mynav .lnr-cog {
  display: inline-block;
  float: right;
}
.weather-card .top .wrapper .heading {
  margin-top: 20px;
  font-size: 35px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .location {
  margin-top: 20px;
  font-size: 21px;
  font-weight: 400;
  color: #fff;
}
.weather-card .top .wrapper .temp {
  margin-top: 20px;
}
.weather-card .top .wrapper .temp a {
  text-decoration: none;
  color: #fff;
}
.weather-card .top .wrapper .temp a .temp-type {
  font-size: 85px;
}
.weather-card .top .wrapper .temp .temp-value {
  display: inline-block;
  font-size: 85px;
  font-weight: 600;
  color: #fff;
}
.weather-card .top .wrapper .temp .deg {
  display: inline-block;
  font-size: 35px;
  font-weight: 600;
  color: #fff;
  vertical-align: top;
  margin-top: 10px;
}
.weather-card .top:after {
  content: "";
  height: 100%;
  width: 100%;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
}
.weather-card .bottom {
  padding: 0 30px;
  background: #fff;
}
.weather-card .bottom .wrapper .forecast {
  overflow: hidden;
  margin: 0;
  font-size: 0;
  padding: 0;
  padding-top: 20px;
  max-height: 155px;
}
.weather-card .bottom .wrapper .forecast a {
  text-decoration: none;
  color: #000;
}
.weather-card .bottom .wrapper .forecast .go-up {
  text-align: center;
  display: block;
  font-size: 25px;
  margin-bottom: 10px;
}
.weather-card .bottom .wrapper .forecast li {
  display: block;
  font-size: 25px;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.25);
  line-height: 1em;
  margin-bottom: 30px;
}
.weather-card .bottom .wrapper .forecast li .date {
  display: inline-block;
}
.weather-card .bottom .wrapper .forecast li .condition {
  display: inline-block;
  vertical-align: middle;
  float: right;
  font-size: 25px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp {
  display: inline-block;
  vertical-align: top;
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  font-weight: 400;
  padding-top: 2px;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .deg {
  display: inline-block;
  font-size: 10px;
  font-weight: 600;
  margin-left: 3px;
  vertical-align: top;
}
.weather-card .bottom .wrapper .forecast li .condition .temp .temp-type {
  font-size: 20px;
}
.weather-card .bottom .wrapper .forecast li.active {
  color: rgba(0, 0, 0, 0.8);
}
.weather-card.rain .top {
  background: url("http://img.freepik.com/free-vector/girl-with-umbrella_1325-5.jpg?size=338&ext=jpg") no-repeat;
  background-size: cover;
  background-position: center center;
}

</style>

<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">TOTAL PURCHASE MONEY</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div class="ml-auto">
                        <h2 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{$sum}}</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">TOTAL SALE</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div class="ml-auto">
                        <h2 class="text-purple"><i class="ti-arrow-up"></i> <span class="counter">{{$orderSum}}</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">GRAND PROFIT</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div class="ml-auto">
                        <h2 class="text-info"><i class="ti-arrow-up"></i> <span class="counter">{{$orderSum-$sum}}</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">TOTAL ORDER</h5>
                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                    <div class="ml-auto">
                        <h2 class="text-danger"><i class="ti-arrow-down"></i> <span class="counter">{{App\Order::count()}}</span></h2>
                    </div>
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->
</div>


 <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Withdrawal Request</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $index => $transaction)
                                <tr>
                                  <td>{{ $index+1 }}</td>
                                  <td>{{ $transaction->user->name }}</td>
                                  <td>{{ $transaction->user->phone }}</td>
                                  <td>{{ $transaction->amount }}</td>
                                  <td>
                                        @if($transaction->status=="complete")
                                        <span class="badge badge-success">Complete</span>
                                        @elseif($transaction->status=="pending")
                                          <span class="badge badge-warning">Pending</span>
                                          @else
                                          <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                  <td>{{ $transaction->created_at }}</td>
                            
                                    

                                    <td>
                                        <button data-toggle="modal" data-target="#verticalcenter1{{$index}}" class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>

                                <div id="verticalcenter1{{$index}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vcenter"> Transaction Update</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('transaction.status.update',$transaction->id)}}" class="form-control" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="transaction_status" id="" class="form-control">
                                                            
                                                            <option {{ $transaction->status == 'pending' ?'selected' : ''}} value="pending">Pending</option>
                                                            <option {{ $transaction->status == 'complete' ?'selected' : ''}} value="complete">Complete</option>
                                                            <option {{ $transaction->status == 'return' ?'selected' : ''}} value="return">Reject</option>
                                                          
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-success" type="submit" name="submit" id="" value="Update">
                                                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                      
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>


<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ORDER STATUS</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>Order Date</th>
                                    <th>amount</th>
                                    <th>Status</th>
                                    <th>Tracking Number</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><a href="{{route('invoice.show',$order->id)}}">#INV0000{{$order->id}}</a></td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->created_at->format('d M, Y')}}</td>
                                    <td>{{$order->total_after_shipping}} tk</td>
                                    <td>
                                        @if($order->order_statuses_id==NULL || $order->order_statuses_id=='')
                                        <span class="badge badge-warning">Reviewing</span>
                                        @else
                                            <span class="badge" style="background-color: {{$order->orderStatus->color}}">{{$order->orderStatus->name}}</span>
                                        @endif
                                    </td>
                                    <td><span style="background-color: #b9ffe9;">{{$order->order_tracking_number}}</span></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#verticalcenter{{$index}}" class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </span>
                                        </button>
                                        <a href="{{route('order.show',$order->id)}}" class="btn btn-sm btn-success waves-effect waves-light" type="button">
                                            <span class="btn-label">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </a>
                                        
                                    </td>
                                </tr>

                                <div id="verticalcenter{{$index}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vcenter"> Status Update</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('order.update',$order->id)}}" class="form-control" method="post">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="ostatus" id="" class="form-control">
                                                            @foreach(App\OrderStatus::all() as $status)
                                                            <option {{$status->id==$order->status ? 'selected' :''}} value="{{$status->id}}">{{$status->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="id" id="" value="{{$order->id}}">
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-success" type="submit" name="submit" id="" value="Update">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>






@endsection
@section('script')
<script>
        $('#myTable1').DataTable({
        
    });
</script>
@endsection