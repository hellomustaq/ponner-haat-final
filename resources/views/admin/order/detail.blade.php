@extends('admin.layouts.master')

@php
$orderExtended=$order;
@endphp
@section('style')
<style>

</style>
@endsection



@section('content')

<h3 style="text-align: center;">Order Details</h3><br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
	                    <img class="card-img-top img-responsive" src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img1.jpg" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title" style="text-align: center;">{{$order->user->name}}</h4>
	                        <p class="card-text" style="text-align: center;">Address : {{$order->user->address}} <br> Phone : {{$order->user->phone}} <br> Email : {{$order->user->email}}</p>
	                    </div>
	                </div>
				</div>
				<div class="col-md-5" style="text-align: left;max-height: 277px;">

						<table class="table" style="background-color: white;">
							<thead>
								<tr class="">
									<th>
										Total Amount : 
									</th>
									<th style="text-align: right;font-size: 24px; font-weight: bold;">
										<span class="badge badge-warning">{{$order->total}}</span>
									</th>
								</tr>
								<tr class=""> 
									<th>
										Total Amount After Coupon: 
									</th>
									<th style="text-align: right;font-size: 24px; font-weight: bold;">
										<span class="badge badge-warning">{{$order->total_after_coupon}}</span>
									</th>
								</tr>
								<tr class="">
									<th>
										Total Amount After Shipping Charge:
									</th>
									<th style="text-align: right;font-size: 24px; font-weight: bold;">
										<span class="badge badge-success">{{$order->total_after_shipping}}</span>
									</th>
								</tr>
								<tr class="">
									<th>
										Order Status : 
									</th>
									<th style="text-align: right;font-size: 24px; font-weight: bold;">
										@if($order->order_statuses_id==NULL || $order->order_statuses_id=='')
			                        	<span data-toggle="modal" data-target="#verticalcenter" class="badge badge-warning">Reviewing</span>
			                        	@else
			                        		<span data-toggle="modal" data-target="#verticalcenter" class="badge" style="background-color: {{$order->orderStatus->color}}">{{$order->orderStatus->name}}</span>
			                        	@endif
									</th>
								</tr>
							</thead>
						</table>

						{{-- order status update modal --}}

						<div id="verticalcenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
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
					
				</div>
				<div class="col-md-4">
					<ul class="list-group">
                        <li class="list-group-item">Invoice ID : <b><a href="{{route('invoice.show',$order->id)}}">#INV0000{{$order->id}}</a></b></li>
                        <li class="list-group-item">Order Date : <b>{{$order->created_at->format('d M, Y')}}</b></li>
                        <li class="list-group-item">Order ID : <b>{{$order->id}}</b></li>
                        <li class="list-group-item">Tracking Num : <b>{{$order->order_tracking_number}}</b></li>
                        <li class="list-group-item">Shipping address : <b>{{$order->shipping_address}}</b></li>
                        <li class="list-group-item">Shipping Method : <b>{{$order->orderShippingMethod->name}} ({{$order->orderShippingMethod->cost}} Tk)</b></li>
                    </ul>
					<div class="progress">
						<div class="progress-bar w-75">
						</div>
					</div>
				</div>
			</div>
			<table class="table" style="background-color: white;">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product Name
						</th>
						<th>
							Price per unit
						</th>
						<th>
							Quentity
						</th>
						<th>
							Discount
						</th>
						<th>
							Total After Discount
						</th>
						<th>
							VAT
						</th>
						
						
						<th>
							Total After VAT
						</th>
						<th>
							G Total
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order->orderDetails as $index=> $order)
					<tr>
						<td>
							{{$index+1}}
						</td>
						<td>
							<p>{{$order->product->name}}</p>
							@if(!empty($order->size))
							<p>Size : {{$order->size}}</p>
							@endif
							@if(!empty($order->color))
							<p>Color : {{$order->color}}</p>
							@endif

						</td>
						<td>
							{{$order->product->price_per_unit}}
						</td>
						<td>
							{{$order->quantity}}
						</td>
						<td>
							{{$order->product->discount}} %
						</td>
						<td>
							{{$order->total_after_discount}}
						</td>
						<td>
							{{$order->product->vat}} %
						</td>
						
						
						<td>
							{{$order->total_after_vat}}
						</td>
						<td>
							{{$order->total_after_vat}}
						</td>
					</tr>
					@endforeach

					<tr>
						<th colspan="7"></th>
						<th>Coupon Applied (tk)</th>
						<th style="text-align: right;">- {{$orderExtended->total-$orderExtended->total_after_coupon}}</th>
					</tr>
					<tr>
						<th colspan="7"></th>
						<th>Total After Coupon</th>
						<th style="text-align: right;background-color: lightgreen;">{{$orderExtended->total_after_coupon}}</th>
					</tr>
					<tr>
						<th colspan="7"></th>
						<th>Shipping Cost</th>
						<th style="text-align: right;"> + {{$orderExtended->orderShippingMethod->cost}}</th>
					</tr>
					<tr>
						<th colspan="7"></th>
						<th>TOTAL</th>
						<th style="text-align: right;background-color: lightgreen;">{{$orderExtended->total_after_shipping}}</th>
					</tr>
					
				</tbody>
			</table>

		</div>
	</div>
</div>


@endsection



@section('script')
<script>
    
</script>
 
@endsection