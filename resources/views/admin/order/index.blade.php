@extends('admin.layouts.master')


@section('style')
<style>

</style>
@endsection



@section('content')


<div class="row">
	<div class="col-md-12">
	    <div class="card">
	        <div class="card-body">
	           
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">All</span></a> </li>
	                {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Delivered</span></a> </li>
	                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#messages" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">All</span></a> </li> --}}
	            </ul>
	            <!-- Tab panes -->
	            <div class="tab-content tabcontent-border">



	                <div class="tab-pane active" id="home" role="tabpanel">
	                    <div class="">
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





	                <div class="tab-pane p-20" id="profile" role="tabpanel">
						<div class="card">
						    <div class="card-body">
						        <div class="table-responsive">
						            <table id="myTable2" class="table table-bordered table-striped">
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
						                        <td>fgdf %</td>
						                        <td>fgdf</td>
						                        <td>fgdf</td>
						                        <td>
						                        	@if($order->status==NULL || $order->status=='')
						                        	<span class="badge badge-warning">Reviewing</span>
						                        	@else
						                        	@endif
						                        </td>
						                        <td>fgdf</td>
						                        <td>
						                        	<button class="btn btn-sm btn-info waves-effect waves-light" type="button">
						                        		<span class="btn-label">
						                        			<i class="fa fa-pencil-square-o"></i>
						                        		</span>
						                        	</button>
						                        	
						                     	</td>
						                    </tr>
						                    @endforeach
						                </tbody>
						            </table>
						        </div>
						    </div>
						</div>
	                </div>





	                <div class="tab-pane p-20" id="messages" role="tabpanel">
	                	<div class="card">
						    <div class="card-body">
						        <div class="table-responsive">
						            <table id="myTable3" class="table table-bordered table-striped">
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
						                        <td>#	                        	
						                        </td>
						                        <td>fgdf %</td>
						                        <td>fgdf</td>
						                        <td>fgdf</td>
						                        <td>
						                        	@if($order->status==NULL || $order->status=='')
						                        	<span class="badge badge-warning">Reviewing</span>
						                        	@else
						                        	@endif
						                        </td>
						                        <td>fgdf</td>
						                        <td>
						                        	<button class="btn btn-sm btn-info waves-effect waves-light" type="button">
						                        		<span class="btn-label">
						                        			<i class="fa fa-pencil-square-o"></i>
						                        		</span>
						                        	</button>
						                        	
						                     	</td>
						                    </tr>
						                    @endforeach
						                </tbody>
						            </table>
						        </div>
						    </div>
						</div>
	                </div>
	            </div>
	        </div>
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
    $('#myTable3').DataTable({
        
    });
</script>
 
@endsection