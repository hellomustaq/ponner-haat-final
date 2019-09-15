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
			<div class="card-header bg-warning">
				<h4 class="m-b-0 text-white">Adding a Sub category</h4>
			</div>
			<div class="card-body">
				<form action="{{route('sub-category.store')}}" method="post">
					@csrf
					<div class="form-body">
						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label for="selectField">Select Mother Category <span class="required">*</span></label>
								<select id="motherCategory" name="motherCategory" class="form-control" required>
									<option >place choose ---</option>
									@foreach($motherCategories as $motherCategory)
										<option value="{{$motherCategory->id}}">{{$motherCategory->name}}</option>
									@endforeach
								</select>
									
									@if ($errors->has('name'))
									    <small class="form-control-feedback text-danger">{{ $errors->first('motherCategory') }}</small>
									@endif
									
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>					
					</div>

						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label for="selectField">Select Category <span class="required">*</span></label>
								<select id="category" name="category" class="form-control"  required>
									<option selected>place choose ---</option>
								</select>
									
									@if ($errors->has('category'))
									    <small class="form-control-feedback text-danger">{{ $errors->first('category') }}</small>
									@endif
									
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>					

					<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Sub Category Name <span class="required">*</span></label>
									<input type="text" id="subCategory" name="subCategoryName" class="form-control" placeholder="" required disabled>
									
									@if ($errors->has('name'))
									    <small class="form-control-feedback text-danger">{{ $errors->first('subCategoryName') }}</small>
									@endif
									
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>					
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
						<button type="button" class="btn btn-inverse">Cancel</button>
					</div>
				</form>

							<br>
			<h3 style="margin-left: 10px;">All Categories</h3>

			<table class="table" id="example23" style="margin-left: 10px;">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach(App\SubCategory::all() as $index => $mc)
			    <tr>
			      <th scope="row">{{$index+1}}</th>
			      <td>{{$mc->name}}</td>
			      <td>
			      	<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$index}}">Edit</a>
			      	@if($mc->products->count()>0)
			      	<a id="deleteNo" style="color: white;" class="btn btn-sm btn-danger">Delete</a>
			      	@else

			      	<a id="deleteBtn" data-id="{{$mc->id}}" href="#" class="btn btn-sm btn-danger">Delete</a>
			      	@endif
			      </td>
			    </tr>


			    <div class="modal fade" id="exampleModalCenter{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="{{route('sub-category.update',$mc->id)}}" method="post">
				        	@csrf
				        	{{method_field('PUT')}}
				        	<div class="form-group">
							    <label for="exampleInputEmail1">Name</label>
							    {{-- <input type="hidden" name="id" value="{{$mc}}"> --}}
							    <input required="" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$mc->name}}"><br><br>
							    <input type="submit" class=" btn btn-success" value="Update">
							  </div>
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
	</div>
</div>
<!-- Row -->
<!-- Row -->
@endsection



@section('script')
<script>
	 $('#example23').DataTable({
        
    });

	 $(document).on('click', '#deleteBtn', function(el) {
		var mcId = $(this).data("id");
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
		   window.location.href = window.location.href = "delete/" + mcId;
		  }
		   

		});
	});

	$(document).on('click', '#deleteNo', function(el) {
		swal ( "Oops" ,  "You can't delete this. Some product belongs to it!!" ,  "error" )
	})
</script>	

<script>
	

    $('#motherCategory').on('change', e => {
    	e.preventDefault();
        $('#category').empty();
        $('#category').append(`<option>Please Choose</option>`);

        var mcId=$('#motherCategory').find(":selected").val();
        console.log(mcId);
        $.ajax({
            url: `category/${mcId}`,
            success: data => {
                data.categories.forEach(category =>
                    $('#category').append(`<option value="${category.id}">${category.name}</option>`)
                )
            }
        })
    });

    $('#category').on('change', e => {
        document.getElementById("subCategory").removeAttribute("disabled");
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
@endsection