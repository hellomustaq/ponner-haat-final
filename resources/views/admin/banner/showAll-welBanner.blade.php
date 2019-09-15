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
	    @foreach($banner as $index => $banner)
	    <tr>
	    	<td>{{$index+1}}</td>
	    	<td> <img height="50" width="80" src="{{asset('images/banner/'.$banner->name)}}" alt=""> </td>
	    	<td><a href="{{route('banner.del',$banner->id)}}" class="btn btn-sm btn-danger">Del</a></td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
@endsection



@section('script')
<script>
	
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
@endsection