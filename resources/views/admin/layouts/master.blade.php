<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Feb 2019 05:05:38 GMT -->
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('images/logos/kina_kini_logo1.png')}}" type="image/x-icon" />
	{{-- <title>Pinjira | Admin</title> --}}
	<title>Ponner-haat | Admin</title>
	@yield('style')
	{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}
	<!-- This page CSS -->
	<!-- This page CSS -->
	<{{-- link href="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/morrisjs/morris.css" rel="stylesheet"> --}}



	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link href="{{asset('admin/dist/css/tagsinput.css')}}" rel="stylesheet" type="text/css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.css" />
	<!-- Custom CSS -->
	<link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
	<!-- Dashboard 1 Page CSS -->
	<link href="{{asset('admin/dist/css/pages/dashboard4.css')}}" rel="stylesheet">


	{{-- datetime picker css --}}
	<link href="{{asset('admin/dist/css/pages/jquery.datetimepicker.min.css')}}" rel="stylesheet">

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	{{-- datatable css --}}
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	{{-- select 2 --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	
	<style>
		/*input[type=text], input[type=pasword], input[type=email],input[type=number] {
		 border: 1px solid #03a9f3;
		}*/
	</style>

	@yield('link')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body class="skin-default fixed-layout">
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
        <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Ponner-haat Admin</p>
        </div>
    </div>
	@yield('preloader')
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	@include('admin.layouts.header')

	<!-- ============================================================== -->
	<div id="main-wrapper">
	    <!-- ============================================================== -->
	    <!-- Topbar header - style you can find in pages.scss -->
	    <!-- ============================================================== -->

	    <!-- ============================================================== -->
	    <!-- End Topbar header -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- Left Sidebar - style you can find in sidebar.scss  -->
	    <!-- ============================================================== -->
	    @include('admin.layouts.leftside-panel')
	    <!-- ============================================================== -->
	    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- Page wrapper  -->
	    <!-- ============================================================== -->
	    <div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">

		    <div class="row page-title">
			<div class="col-md-12">
			    @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
			    @endif
			    @if(Session::has('errors'))
                            <p class="alert alert-danger">{{ Session::get('errors') }}</p>
			    @endif
			</div>

		    </div>

		    @yield('content')

		    <!-- ============================================================== -->
		    <!-- ============================================================== -->
		    <!-- Comment - chats -->
		    <!-- ============================================================== -->
		    <!-- ============================================================== -->
		    <!-- End Comment - chats -->
		    <!-- ============================================================== -->
		    <!-- ============================================================== -->
		    <!-- End Page Content -->
		    <!-- ============================================================== -->
		    <!-- ============================================================== -->
		    <!-- Right sidebar -->
		    <!-- ============================================================== -->
		    <!-- .right-sidebar -->
		    @include('admin.layouts.rightside-panel')
		    <!-- ============================================================== -->
		    <!-- End Right sidebar -->
		    <!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
	    </div>
	    <!-- ============================================================== -->
	    <!-- End Page wrapper  -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- footer -->
	    <!-- ============================================================== -->
	    @include('admin.layouts.footer')
	    <!-- ============================================================== -->
	    <!-- End footer -->
	    <!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	{{-- <script src="admin/dist/js/jquery-3.2.1.min.js')}}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('admin/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admin/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--Sky Icons JavaScript -->
    {{-- <script src="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/skycons/skycons.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skycons/1396634940/skycons.min.js"></script>
    <!--morris JavaScript -->
    {{-- <script src="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/raphael/raphael-min.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>

    {{-- <script src="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/morrisjs/morris.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>

    {{-- <script src="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <!-- Chart JS -->
    <script src="{{asset('admin/dist/js/dashboard4.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="{{asset('admin/dist/js/tagsinput.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script> --}}
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    {{-- date time picker --}}
    <script src="{{asset('admin/dist/js/pages/jquery.datetimepicker.full.min.js')}}"></script>

    {{-- datatable js --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    
    
    

    @yield('script')
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Feb 2019 05:05:39 GMT -->
</html>