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
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Image</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@if(isset($singleAd))
	    
	    <tr>
	    	<td>1</td>
	    	<td> <img height="80" width="400" src="{{asset('images/banner/'.$singleAd->name)}}" alt=""> </td>
	    	<td><a data-toggle="modal" data-target="#exampleModal1" class="btn btn-sm btn-primary">Update</a> <a onclick="return confirm('are you sure??');" href="{{route('welcome-thin.del',$singleAd->id)}}" class="btn btn-sm btn-danger">Del</a></td>
	    </tr>
	    
	    @else

	    	<h6>No ads found</h6>
	    	<button id="add" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add</button><br>

	    @endif

	  </tbody>
	</table>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><span style="color: red;">1680*200 px</span></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="{{route('welcome-thin.add')}}" method="post" enctype="multipart/form-data">
	        	@csrf
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Choose Ad image </label>
			    <input name="singleAd" type="file" class="form-control-file" id="exampleFormControlFile1">
			  </div>
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
@if(isset($singleAd))
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><span style="color: red;">1680*200 px</span></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="{{route('welcome-thin.update',$singleAd->id)}}" method="post" enctype="multipart/form-data">
	        	@csrf
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Choose Ad image </label>
			    <input name="singleAd" type="file" class="form-control-file" id="exampleFormControlFile1">
			  </div>
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
	@endif
@endsection



@section('script')
<script>
	
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
@endsection