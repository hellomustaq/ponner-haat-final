@extends('admin.layouts.master')

@section('style')
<style>

</style>
@endsection



@section('content')

<div class="row">

<div class="col-md-4 m-t-20">
	<div class="card text-center">
		<div class="card-body">
		    <h4 class="card-title">Create A New</h4>
		    <p class="card-text"></p>
		    <a data-toggle="modal" data-target="#verticalcenter" href="#" class="btn btn-circle btn-info btn-sm">
		    	<i class="fa fa-plus"></i>
		    </a>
		    
		</div>
	</div>
</div>

@foreach($status as $index=> $status)

<div class="col-md-4 m-t-20">
	<div class="card text-center" style="background-color: {{$status->color}}">
		<div class="card-body">
		    <h4 class="card-title">{{$status->name}}</h4>
		    <p class="card-text"></p>
		    <a data-toggle="modal" data-target="#verticalcenter{{$index}}" href="#" class="btn btn-info btn-sm">
		    	<i class="fa fa-pencil-square-o"></i>
		    </a>
		    <a  href="#" id="deleteBtn" data-id="{{$status->id}}" class="btn btn-danger btn-sm">
		    	<i class="fa fa-trash-o"></i>
		    </a>
		</div>
	</div>
</div>


<div id="verticalcenter{{$index}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Order Status Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{route('status.update',$status->id)}}" class="form-control" method="post">
                	@csrf
                	{{ method_field('PUT') }}
                	<div class="form-group">
	                    <label>Name</label>
	                    <input type="hidden" name="id" id="" value="{{$status->id}}">
	                    <input type="text" name="uname" class="form-control" value="{{$status->name}}" required>
	                </div>
	                <div class="form-group">
	                    <label>Color</label>
	                    <input type="color" name="color" class="form-control" value="{{$status->color}}" required>
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

</div>

<div id="verticalcenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Order Status Add</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{route('status.store')}}" class="form-control" method="post">
                	@csrf
                	<div class="form-group">
	                    <label>Status Name : </label>
	                    <input name="cname" type="text" class="form-control" value="" required>
	                </div>
	                <div class="form-group">
	                    <label>Color</label>
	                    <input type="color" name="color" class="form-control" required>
	                </div>
	                <div class="form-group">
	                	<input class="btn btn-success" type="submit" name="submit" id="" value="Create">
	                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class=" waves-effect" data-dismiss="modal">Hide</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection



@section('script')

<script>

	$(document).on('click', '#deleteBtn', function(el) {

		var methodId = $(this).data("id");
		 $.ajax({
	        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	       type: "get",
	       url:  "status/ajax/del/" + methodId,
	       // serializes the form's elements.
	       success: function(data){
	       	if (data.delete) {
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
				   window.location.href = window.location.href = "status/delete/" + methodId;
				  }
				});
	       	}else{
	       		swal ( "Oops" ,  "You can not delete this status! because some order belongs to it!!\n Better to edit this!" ,  "error" )
	       	}
	       }

	       });


		
	});


</script>

 
@endsection