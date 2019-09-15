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
<style>
.select2-container--default .select2-selection--multiple .select2-selection__rendered li{
	color: black;

}
</style>
<div class="row">
{{-- 	@php
		$u=App\UserCoupon::find(2);
		foreach ($u->users as $key => $c) {
			$c->name;
			echo $c->name;
		}
	@endphp --}}
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header" style="background-color: #607d8b">
                <h4 class="m-b-0 text-white">Create Independent Coupon Codes</h4>
            </div>
            <form action="{{route('icoupon.store')}}" method="post">
	            <div class="card-body">            
                    @csrf
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-9">
	                            <label for="">Coupon Code <small>(IC is prefix)</small><span class="required">*</span></label>
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                                <button class="btn btn-info" type="button">IC</button>
		                            </div>
		                            <input id="coupon" name="coupon_code" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
		                        </div>
		                    </div>
		                    <div class="col-md-3">
		                    	<label for="">-------------</label>
		                    	 <div class="input-group mb-3">
			                    	
			                    	<div class="input-group-prepend">
		                                <button class="btn btn-success btn-xs" id="auto" type="button">Auto Genarete</button>
		                            </div>
			                    </div>
		                    </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Discount (%)<span class="required">*</span></label>
                                <input type="text" id="" name="discount" class="form-control" placeholder="" required>


                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Maximum Uses<span class="required">*</span></label>
                                <input type="number" id="" name="max_uses" class="form-control" placeholder="" required>

                                

                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Maximum uses one user<span class="required">*</span></label>
                                <input type="number" id="" name="max_uses_user" class="form-control" placeholder="" required>

                                

                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Start Date<span class="required">*</span></label>
                                <input type="text" id="datetimepicker" name="start_date" class="form-control" placeholder="" required>

                               

                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">End Date<span class="required">*</span></label>
                                <input type="text" id="datetimepicker1" name="end_date" class="form-control" placeholder="" required>

                            </div>
                        </div>
                    </div>
                 
	            </div>
	            <div class="form-actions">
	                <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Create</button>
	                <button type="button" class="btn btn-inverse">Cancel</button>
	            </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Create Coupon Codes for specific user</h4>
            </div>
            <form action="{{route('ucoupon.store')}}" method="post">
	            <div class="card-body">
	                
	                    @csrf
	                    <div class="form-body">
	                        <div class="row p-t-20">
	                            <div class="col-md-9">
		                            <label for="">Coupon Code <small>(UC is prefix)</small><span class="required">*</span></label>
			                        <div class="input-group mb-3">
			                            <div class="input-group-prepend">
			                                <button class="btn btn-info" type="button">UC</button>
			                            </div>
			                            <input id="coupon_uc" name="coupon_code_uc" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                    	<label for="">-------------</label>
			                    	 <div class="input-group mb-3">
				                    	
				                    	<div class="input-group-prepend">
			                                <button class="btn btn-success btn-xs" id="auto_uc" type="button">Auto Genarete</button>
			                            </div>
				                    </div>
			                    </div>
                        	</div>
	                    </div>

	                    <div class="form-body">
	                        <div class="row p-t-20">
	                            <div class="col-md-12">
	                                <div class="form-group">
	                                    <label for="selectField">Select Users<span class="required">*</span></label>
	                                    <select class="js-example-basic-multiple form-control" name="users[]" multiple="multiple" required>
	                                    @foreach(App\User::where('role_id',2)->get() as $user)
										  <option value="{{$user->id}}" style="color: black;">{{$user->name}}</option>
										@endforeach
										</select>

	                                    

	                                </div>
	                            </div>
	                            <!--/span-->
	                            <!--/span-->
	                        </div>
	                    </div>
	                    <div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label class="control-label">Discount (%)<span class="required">*</span></label>
	                                <input type="text" id="" name="discount_uc" class="form-control" placeholder="" required>


	                            </div>
	                        </div>
	                    </div>
	                    <div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label class="control-label">Maximum uses one user<span class="required">*</span></label>
	                                <input type="number" id="" name="max_uses_user_uc" class="form-control" placeholder="" required>

	                                

	                            </div>
	                        </div>
	                    </div>
						<div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label class="control-label">Start Date<span class="required">*</span></label>
	                                <input type="text" id="datetimepicker2" name="start_date_uc" class="form-control" placeholder="" required>

	                               

	                            </div>
	                        </div>
	                    </div>
	                    <div class="row p-t-20">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label class="control-label">End Date<span class="required">*</span></label>
	                                <input type="text" id="datetimepicker3" name="end_date_uc" class="form-control" placeholder="" required>

	                            </div>
	                        </div>
	                    </div>


	                </div>
	                <div class="form-actions">
	                <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Create</button>
	                <button type="button" class="btn btn-inverse">Cancel</button>
	            </div>
	            </div>
	            
            </form>
        </div>
    </div>
</div>

<!-- Row -->
<!-- Row -->
@endsection



@section('script')

 
<script>
	$( "#auto").on( "click",function() {
		let promoCode = Math.random().toString(36).substring(6,11).toUpperCase();
		// promoCode="IC"+promoCode;
		console.log(promoCode);

		$('#coupon').val(promoCode);


	});
	$( "#auto_uc").on( "click",function() {
		let promoCode = Math.random().toString(36).substring(6,12).toUpperCase();
		// promoCode="IC"+promoCode;
		console.log(promoCode);

		$('#coupon_uc').val(promoCode);


	});
</script>

<script>
	jQuery('#datetimepicker').datetimepicker({
		format:'Y-m-d h:i:s',
	});
	jQuery('#datetimepicker1').datetimepicker({
		format:'Y-m-d h:i:s',
	});
	jQuery('#datetimepicker2').datetimepicker({
		format:'Y-m-d h:i:s',
	});
	jQuery('#datetimepicker3').datetimepicker({
		format:'Y-m-d h:i:s',
	});

</script>
<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
    	 placeholder: 'Select users',
    	 closeOnSelect: false
    });
});
</script>
@endsection