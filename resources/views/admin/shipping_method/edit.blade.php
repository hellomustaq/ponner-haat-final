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
				<h4 class="m-b-0 text-white">Update Shipping Method</h4>
			</div>
			<div class="card-body">
				<form action="{{route('shipping-method.update',$method->id)}}" method="post">
					@csrf
					{{ method_field('PATCH') }}
					<div class="form-body">
						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label for="selectField">Shipping method name <span class="required">*</span></label>
									<input type="hidden" name="id" value="{{$method->id}}">
									<input type="text" class="form-control" name="name" value="{{$method->name}}">
									
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
									<label class="control-label">Cost (tk)<span class="required">*</span></label>
									<input type="text" id="cost" name="cost" class="form-control" placeholder="" required value="{{$method->cost}}">
									
									@if ($errors->has('cost'))
									    <small class="form-control-feedback text-danger">{{ $errors->first('name') }}</small>
									@endif
									
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>					
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
						<button type="button" class="btn btn-inverse">Cancel</button>
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

@endsection