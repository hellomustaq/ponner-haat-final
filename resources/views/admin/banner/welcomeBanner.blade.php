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
				<h4 class="m-b-0 text-white">Adding a Welcome Page Title Banner</h4>
			</div>
			<div class="card-body">
				<form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">Upload Banner <small style="color: red"> (1395px * 520px || max 1 MB)</small> <span class="required">*</span></label>
							<input type="file" id="" name="welBanner" class="form-control" placeholder="" required >
						</div>				
					</div>
					<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label for="selectField">Select Category <span class="required">*</span></label>
									@php
									$categories=App\Category::all();
									@endphp
								<select id="category" name="catId" class="form-control"  required>
									<option selected>place choose ---</option>
									@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
									
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>	
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">Note <span class="required">*</span></label>
								<input type="text" id="" name="note" class="form-control" placeholder=""  >
							</div>				
						</div>				
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Row -->
<!-- Row -->
@endsection



@section('script')
<script>
	
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
@endsection