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
{{-- <div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Form Layout</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Form Layout</li>
			</ol>
			<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
		</div>
	</div>
</div> --}}
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Method Name</th>
								<th>Cost</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($methods as $index=> $method)
							<tr>
								<td>{{$index+1}}</td>
								<td>{{$method->name}}</td>
								<td>{{$method->cost}} tk</td>
								<td>
									<a href="{{route('shipping-method.edit',$method->id)}}" class="btn btn-warning btn-sm waves-effect waves-light" ><span class="btn-label"><i class="fa fa-pencil-square-o"></i></span>
									</a>

									<a id="deleteBtn" data-id="{{$method->id}}" class="btn btn-danger btn-sm waves-effect waves-light" ><span class="btn-label"><i class="fa fa-trash-o"></i></span>
									</a>
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
<!-- Row -->
<!-- Row -->
@endsection



@section('script')
<script>

	$(document).on('click', '#deleteBtn', function(el) {
		var methodId = $(this).data("id");
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this imaginary file!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    swal("Poof! Your imaginary file has been deleted!", {
		      icon: "success",
		    });
		   window.location.href = window.location.href = "shipping-method/delete/" + methodId;
		  }
		   

		});
	});


</script>
@endsection