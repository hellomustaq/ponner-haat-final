@extends('admin.layouts.master')

@section('link')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.css">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet"> --}}

@endsection

@section('style')
<style>
    .required{
	color: red;
	font-size: 15px;
    }

    .toggle-on.btn {
	padding-right: 24px;
    }
    .toggle-on {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 50%;
	margin: 0;
	border: 0;
	border-radius: 0
    }
    .btn-default {
	color: #333;
	background-color: #f5ecec;
	border-color: #ccc;
    }

    .toggle-handle {
	position: relative;
	margin: 0 auto;
	padding-top: 0;
	padding-bottom: 0;
	height: 100%;
	width: 0;
	border-width: 0 1px;
	background: #f1f1f1 !important;
    }


    .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
	/* color: #6d6d6d; */
	/* background: red; */
	border: 1px solid #f1f1f1;
    }

    /*summer note */
    position: relative;
    top: 0px;
    width: 100%;

</style>
@endsection
@section('content')
<style>
	input[type=text],  {
		 border: 1px;
		}
</style>
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
	    <div class="card-header bg-info">
		<h4 class="m-b-0 text-white">New Product Adding</h4>
	    </div>
	    <div class="card-body">
		<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
		    <div class="form-body">
			@csrf
			<div class="row p-t-20">
			    <div class="col-md-6">
				<div class="form-group">
				    <label class="control-label">Product Name <span class="required">*</span></label>
				    <input type="text" name="name" class="form-control" placeholder="">
				     </div>
			    </div>
			    <!--/span-->
			    <div class="col-md-6">
				<div class="form-group">
				    <label class="control-label">Quantity</label>
				    <input name="quantity" type="text" id="lastName" class="form-control" placeholder="">
				    {{-- <small class="form-control-feedback"> This field has error. </small> --}} </div>
			    </div>
			    <!--/span-->
			</div>
			<div class="row p-t-20">
			    <div class="col-md-3">
				<label for="selectField">Select Mother Category <span class="required">*</span></label>
				<select name="motherCategory" id="motherCategory" class="form-control">
				    <option >place choose ---</option>
				    @foreach($motherCategorys as $motherCategory)
				    <option value="{{$motherCategory->id}}">{{$motherCategory->name}}</option>
				    @endforeach
				</select>
			    </div>
			    <div class="col-md-3">
				<label for="selectField">Select Category <span class="required">*</span></label>
				<select name="category" id="category" class="form-control">
				    <option selected>place choose ---</option>
				</select>
			    </div>
			    <div class="col-md-3">
				<label for="selectField">Select Sub Category <span class="required">*</span></label>
				<select name="subCategory" id="subCategory" class="form-control">
				    <option selected>place choose ---</option>
				</select>
			    </div>
			    <div class="col-md-3">
				<label for="selectField">Select Manufacture </label>
				<select name="manufacturer" id="manufacturer" class="form-control">
				    <option selected value="0">place choose ---</option>
				</select>
			    </div>
			</div><br>

			<!--/row-->
			<div class="row p-t-20">
			    <div class="col-md-6">
				<div class="form-group ">
				    <label class="control-label">Price Per Unit <span class="required">*</span></label>
				    <input name="price" type="text" class="form-control custom-select">

				     </div>
			    </div>
			    <!--/span-->
			    <div class="col-md-6">
				<div class="form-group">
				    <label class="control-label">Purchase Price <span class="required">*</span></label>
				    <input name="purchasePrice" type="text" class="form-control" placeholder="">
				</div>
			    </div>
			    <!--/span-->
			</div>
			<!--/row-->
			<div class="row p-t-20">
			    <div class="col-md-6">
				<div class="form-group">
				    <label class="control-label">Available Color</label>
				    <input style="border: unset;" name="color[]" type="text" class="form-control" data-role="tagsinput" multiple>
				</div>
			    </div>

			    <style>
				.bootstrap-tagsinput .badge {
				    margin-right: 2px;
				    color: #000;
				    background-color: #fec107;
				    padding: 5px 8px;
				    border-radius: 3px;
				    border: 1px solid #fec107;
				    font-weight: bold;
				}
			    </style>


			    <div class="col-md-6">
					<div class="form-group">
					    <label class="control-label">Available size</label>
					    <input style="border: unset;" name="size[]" type="text" class="form-control" data-role="tagsinput" multiple>

					</div>
			    </div>
			</div>
			<div class="row p-t-20">
			    <div class="col-md-6">
				<div class="form-group">
				    <label>Discount</label>
				    <input name="discount" type="text" placeholder="Discount in percentage" class="form-control">
				</div>
			    </div>
			    <!--/span-->
			    <div class="col-md-6">
				<div class="form-group">
				    <label>Vat</label>
				    <input name="vat" type="text" class="form-control" placeholder="Vat in percentage ">
				</div>
			    </div>
			    <!--/span-->
			</div>
			<!--/row-->
			<div class="row">
			    <div class="col-md-4">
				<div class="form-group">
				    <label class="control-label">Product Availablity : <span class="required">*</span> </label><br>
				    <div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="productAvailable" id="inlineRadio1" value="1" checked>
					<label class="form-check-label" for="inlineRadio1">Available</label>
				    </div>
				    <div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="productAvailable" value="0">
					<label class="form-check-label" for="inlineRadio2">Not Available</label>
				    </div>
				</div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-md-4">
				<div class="form-group">
				    <label class="control-label">New : <span class="required">*</span> </label><br>
				    <div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="new" id="inlineRadio1" value="1" checked>
					<label class="form-check-label" for="inlineRadio1">Yes</label>
				    </div>
				    <div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="new" value="0">
					<label class="form-check-label" for="inlineRadio2">No</label>
				    </div>
				</div>
			    </div>
			</div>
			<div class="row m-t-20">
			    <div class="col-md-12">
				<div class="form-group">
				    <label class="control-label">Product Description (short) : <span class="required">*</span> </label>
				    <textarea name="description" class="form-control" rows="5" name="description" id="summernot" type="text" ></textarea>
				</div>
			    </div>
			</div>
			<div class="row m-t-20">
			    <div class="col-md-12">
				<div class="form-group">
				    <label class="control-label">Product Specification : </label>
				    <textarea name="specification" class="form-control" rows="12" name="description" id="summernote1" type="text" ></textarea>
				</div>
			    </div>
			</div>
			<div class="row m-t-20">
			    <div class="col-md-12">
				<div class="form-group">
				    <label class="control-label">Product Warrenty Description : </label>
				    <textarea name="warrenty" class="form-control" rows="12" name="description" id="summernote2" type="text" ></textarea>
				</div>
			    </div>
			</div>
			
			<div class="row">
				<div class="field" align="left">
				  <h3>Upload your images</h3>
				  <input type="file" id="files" name="files[]" multiple />
				  <small style="color: red;">Image size 600*600 px is preferable.</small>
				</div>
			</div>
		    </div><br>
		    <div class="form-actions">
			<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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

<script>
	$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip row\">" +
            "<img style=\" float:left\" height=\"100\" width=\"100\"  class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>



{{-- dropdown dynamic ajax --}}

<script>
    $('#motherCategory').on('change', e => {
        $('#category').empty();
        $('#category').append(`<option>Please Choose</option>`);
        $('#subCategory').empty();
        $('#manufacturer').empty();
        var mcId = $('#motherCategory').find(":selected").val();
        console.log(mcId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {
                id: mcId
            },
            url: '{{route("products.search.category")}}',
            success: data => {
                data.categories.forEach(category =>
                    $('#category').append(`<option value="${category.id}">${category.name}</option>`)
                )
            }
        })
    });


    $('#category').on('change', e => {
        $('#subCategory').empty();
        $('#subCategory').append(`<option>Please Choose</option>`);
        $('#manufacturer').empty();
        var cId = $('#category').find(":selected").val();
        console.log(cId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {
                id: cId
            },
            url: '{{route("products.search.subCategory")}}',
            success: data => {
                data.subCategories.forEach(subCategory =>
                    $('#subCategory').append(`<option value="${subCategory.id}">${subCategory.name}</option>`)
                )
            }
        })
    });

    $('#subCategory').on('change', e => {
        $('#manufacturer').empty();
        $('#manufacturer').append(`<option value="0">Please Choose</option>`);
        var mId = $('#subCategory').find(":selected").val();
        console.log('sub cat id' + mId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {
                id: mId
            },
            url: '{{route('products.search.manufacturer')}}',
            success: data => {
                data.manufacturers.forEach(manufacturer =>
                    $('#manufacturer').append(`<option value="${manufacturer.id}">${manufacturer.name}</option>`)
                )
            }
        })
    });
</script>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
    });
</script>

<script>
    $("#available").change(function () {
        if ($(this).prop("checked") == true) {
            var v = document.getElementById("available").value = 1;
            console.log(v);
        } else {
            var v = document.getElementById("available").value = 0;
            console.log(v);
        }
    });
</script>
<script>
    $(function () {
        $('#available').bootstrapToggle({
            on: 'Yes',
            off: 'No',
            size: "normal"
        });
    })
</script>


<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.39/jodit.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script> --}}
{{-- <script>
    $('#summernote').summernote({
        placeholder: 'Write Description Here...',
        tabsize: 2,
        height: 150,
    });
    $('#summernote1').summernote({
        placeholder: 'Write Description Here...',
        tabsize: 2,
        height: 150
    });
    $('#summernote2').summernote({
        placeholder: 'Write Description Here...',
        tabsize: 2,
        height: 150
    });
</script> --}}

{{-- //jodi editor --}}
<script>
var editor = new Jodit('#summernot');
var editor1 = new Jodit('#summernote1');
var editor2 = new Jodit('#summernote2');
</script>

@endsection