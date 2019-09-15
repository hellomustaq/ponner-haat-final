@extends('admin.layouts.master')



@section('style')
@php
		$bg='#fedc19';
		$color=App\Setting::orderBy('created_at','DESC')->first();
		if($color->app_color == '' || $color->app_color == NULL){
			$bg=$color->app_color_default;
		}else{
			$bg=$color->app_color;
		}
	@endphp
<style>
	.required{
		color: red;
		font-size: 15px;
	}
	

	.current-color{
		background-color: {!!$bg!!}!important;
	}


</style>
@endsection



@section('content')
<div class="card text-white current-color mb-3" style="max-width: 18rem;">
  <div class="card-header"></div>
  <div class="card-body">
    <h5 class="card-title">This is current app color</h5>
    <p class="card-text"></p>
  </div>
</div>


<div class="row">
	<div class="col-lg-6">
		<div class="card">
			
			<div class="card-body">
				<form action="{{route('setting.store')}}" method="post">
					@csrf
					<div class="form-body">
						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Update Theme Color<span class="required">*</span></label>
									<input type="color" id="color" name="color" class="form-control" placeholder="" required>
								</div>
							</div>
							<!--/span-->
							<!--/span-->
						</div>					
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
@endsection