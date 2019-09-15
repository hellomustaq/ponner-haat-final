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
		<h4 class="card-title">Hot Product List</h4>
		<div class="table-responsive ">
			<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Price</th>
						<th>Purc. Price</th>
						<th>Discount</th>
						<th>Vat</th>
						<th>Qty</th>
						<th>Color</th>
						<th>size</th>
						<th>Upload</th>
						<th>action</th>
					</tr>.
				</thead>

				<tbody>
					@foreach($hots as $index => $product)
					
					<tr >
						<td>{{$index+1}}</td>
						<td>{{$product->name}}</td>
						
						
						<td>{{$product->price_per_unit}}</td>
						<td>{{$product->purchase_price}}</td>
						<td>{{$product->discount}}%</td>
						<td>{{$product->vat}}%</td>
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
							<a onclick="return confirm('Are you sure to unhot this?')" href="{{route('hot-del',$product->id)}}" class="btn btn-primary btn-sm ">Delete</a>
							
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
        
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>

    

@endsection