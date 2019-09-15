@extends('admin.layouts.master')
@section('style')
<style>
	.paginate_button{
	    padding: 5px;
	    background: #fb997c;
	    border-radius: 5px;
	    margin: 5px;
	    color: black;

}
</style>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="{{asset('admin/dist/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">All Products</h4>
		<div class="table-responsive ">
			<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Price</th>
						<th>Purc. Price</th>
						<th>Discount</th>
						<th>Qty</th>
						<th>Color</th>
						<th>size</th>
						<th>Upload</th>
						<th>action</th>
					</tr>.
				</thead>

				<tbody>
					@foreach($products as $index => $product)
					
					<tr >
						<td>{{$index+1}}</td>
						<td>{{str_limit($product->name,20)}}</td>
						
						
						<td>{{$product->price_per_unit}}</td>
						<td>{{$product->purchase_price}}</td>
						<td>{{$product->discount}}%</td>
						<td>{{$product->quantity}}</td>
						<td>
							@foreach($product->colors as $color)
							<span class="badge badge-success">{{$color->name}}</span><br>
							@endforeach
						</td>
						<td>
							@foreach($product->sizes as $size)
							<span class="badge badge-info">{{$size->name}}</span><br>
							@endforeach

						</td>
						<td>{{$product->created_at->format('d M, Y')}}</td>
						<td>
							<a href="{{route('products.show',$product->id)}}" class="btn btn-primary btn-sm ">Edit</a>
							@if($product->active)
							<a href="{{route('products.deactive',$product->id)}}" class="btn btn-danger btn-sm ">Deactive</a>
							@else
							<a href="{{route('products.active',$product->id)}}" class="btn btn-success btn-sm ">Active</a>
							@endif
							@if(!$product->hot)

								<a onclick="add({{$product->id}},{{$index}});" id="hot{{$index}}" style="color: white;" class="btn btn-info btn-sm">hot</i>
								</a>
							
							@else

								<a onclick="delHot({{$product->id}},{{$index}});" id="delHot{{$index}}" style="color: white;" class="btn btn-danger btn-sm"> <span id="unhot">Unhot</span>
							</a>

							
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

<!-- This is data table -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <script>
    	 $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>

    <script>
    	function add(id,index)
		{

		    $.ajax({
		       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		       type: "POST",
		       url: 'products/hot',
		       data:  {id:id,index:index},
		       success: function(data)
		       {
		       	$('#hot'+data.index).addClass('btn-warning').removeClass('btn-info').removeAttr('onclick');

		      //   	$('#hotP'+data.index).html()
		      //  		$('#hotP'+data.index).empty().append('<a onclick="delHot('+data.id+','+data.index+');" id="delHot'+data.index+'" style="color: white;" class="btn btn-danger btn-sm"> <span id="unhot">Unhot</span>');
		      //  		$('#unhot'+data.index).on("click", function (e) {
				    //     e.preventDefault();
				    // });
		          
		       }
		    });
		}
		function delHot(id,index)
		{
			var u = index;

		    $.ajax({
		       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		       type: "POST",
		       url: 'products/hot/del',
		       data:  {id:id,index:index},
		       success: function(data)
		       {
		       	$('#delHot'+data.index).addClass('btn-warning').removeClass('btn-danger').removeAttr('onclick');
		     //   	$('#unhotP'+data.index).html();
		     //   	$('#unhotP'+data.index).empty().append('<a onclick="add('+data.id+','+data.index+');" id="hot'+data.index+'" style="color: white;" class="btn btn-info btn-sm">hot</i></a>').attr('disbae');
		     //   	$('#hot'+data.index).on("click", function (e) {
			    //     e.preventDefault();
			    // });
		       }
		    });
		}
    </script>

@endsection