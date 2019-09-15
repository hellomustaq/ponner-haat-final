@extends('admin.layouts.master')


@section('style')

<style>
    .required{
		color: red;
		font-size: 15px;
	}
</style>
@endsection



@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Independent Coupons</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Coupon</th>
                        <th>Discount</th>
                        <th>Max Uses</th>
                        <th>Max One User</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($icoupons as $index => $icoupon)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                            @if($icoupon->end_date > date("Y-m-d H:i:s") && $icoupon->active==true)
                                <span class="badge badge-success" style="font-size: 16px">{{$icoupon->coupon_code}}</span>
                            @else
                                <span class="badge badge-warning" style="font-size: 16px">{{$icoupon->coupon_code}}</span>
                            @endif


                            
                        </td>
                        <td>{{$icoupon->discount}} %</td>
                        <td>{{$icoupon->max_uses}}</td>
                        <td>{{$icoupon->max_uses_user}}</td>
                        <td>{{$icoupon->start_date}}</td>
                        <td>{{$icoupon->end_date}}</td>
                        <td>
                            @if($icoupon->end_date > date("Y-m-d H:i:s") && $icoupon->active==true)

                                 <a onclick="return confirm('Are you sure to deactive??');" href="{{route('icoupon.update.coustom',$icoupon->id)}}" style="color: white;" class="btn btn-danger waves-effect waves-light"><span class="btn-label"><i class="fa fa-ban"></i></span>Deactive</a>
                            @else
                                <button type="button" class="btn  btn-block btn-secondary btn-disable">Unusable</button>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">User Assign Coupons</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Coupon</th>
                        <th>Users</th>
                        <th>Discount</th>
                        <th>Max One User</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($ucoupons as $index => $icoupon)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>
                        	@if($icoupon->end_date > date("Y-m-d H:i:s") && $icoupon->active==true)
								<span class="badge badge-success" style="font-size: 16px">{{$icoupon->coupon_code}}</span>
                        	@else
								<span class="badge badge-warning" style="font-size: 16px">{{$icoupon->coupon_code}}</span>
                        	@endif


                        	
                        </td>
                        <td>
                            @foreach($icoupon->users as $user)
                                <span class="badge badge-primary">{{$user->id}} | {{$user->name}}</span><br>
                            @endforeach
                        </td>
                        <td>{{$icoupon->discount}} %</td>
                        <td>{{$icoupon->max_uses_user}}</td>
                        <td>{{$icoupon->start_date}}</td>
                        <td>{{$icoupon->end_date}}</td>
                        <td>
                        	@if($icoupon->end_date > date("Y-m-d H:i:s") && $icoupon->active==true)

                        		 <a onclick="return confirm('Are you sure to deactive??');" href="{{route('ucoupon.update.coustom',$icoupon->id)}}" style="color: white;" class="btn btn-danger waves-effect waves-light"><span class="btn-label"><i class="fa fa-ban"></i></span>Deactive</a>
                        	@else
                        		<button type="button" class="btn  btn-block btn-secondary btn-disable">Unusable</button>

                        	@endif
                     	</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection



@section('script')
<script>
    $('#myTable1').DataTable({
        
    });
    $('#myTable2').DataTable({
        
    });
   
    </script>
@endsection