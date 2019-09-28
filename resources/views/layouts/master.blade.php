
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    {{-- <title>Pinjira | Online shop</title> --}}
    <title>Ponner Haat | Online shop</title>
    <!--Fevicon-->
    {{-- <link rel="icon" href="{{asset('images/logos/Pinjira_Logo.png')}}" type="image/x-icon" /> --}}
    <link rel="icon" href="{{asset('images/logos/kina_kini_logo1.png')}}" type="image/x-icon" />
    <!-- Bootstrap css -->
    @yield('style')

    <link rel="stylesheet" href="{{asset('template-asset/css/bootstrap.min.css')}}">

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
            @media (max-width: 479px) and (min-width: 320px){
                .header-call-action {
                    margin-bottom: 6px!important;
                }
            }
            .top-search-btn {
                line-height: 42px!important;
            }

            input.top-cat-field {
                border: 1px solid #e0e0e0;
                color: #a4a4a4;
                font-size: 13px;
                height: 42px!important;
                padding: 0 10px;
                width: calc(100% - 300px);
                float: left;
            }

            a{
                color: unset;
            }
            .pro-title{
                font-size: 14px;
                color: black!important;
            }

            .header-call-action p {
                color: #111;
                font-size: 15px;
                font-weight: 500;
                padding: 6px 0;
            }
            .header-top-menu{
                height: 35px;
            }

            .main-menu ul li ul.mega-menu.mega-full {
                margin: 0 auto;
                padding: 10px;
                width: 100%;
                margin-top: -22px;
            }
            .header-call-action p {
                color: #111;
                font-size: 15px;
                font-weight: 500;
                padding: 5px 0!important;
            }

            @media (max-width: 1500px) and (min-width: 1200px){
                .main-menu li > a {
                    padding: 7px 8px !important;
                }
            }

            @media (max-width: 991px){
                .mean-container a.meanmenu-reveal {
                color: #333;
                height: 27px;
                top: -45px!important;
            }
            }
                




        .mini-cart-drop-down{
            border-bottom:2px solid {!!$bg!!} !important;
        }
        .listSub:hover {
            background-color: {!!$bg!!} !important;
        }
        .theme-bg {
            background: {!!$bg!!} !important;
        }
        .bg-color {
            background-color: {!!$bg!!} !important;
        }
        .btn-cart {
            background: {!!$bg!!} !important;
        }
        .label_sale {
            background: {!!$bg!!} !important;
            color: #111;
        }
        .btn-1.home-btn {
            background: {!!$bg!!}!important;
        }
        .main-menu ul li ul.mega-menu {
            border-bottom: 2px solid {!!$bg!!} !important;
        }
        .main-menu ul li ul.mega-menu li ul li:hover a {
            color: {!!$bg!!}!important;
        }
        .top-search-btn {
            background: {!!$bg!!} none repeat scroll 0 0 !important;
        }
        .mini-cart-option li a:hover{
            color: {!!$bg!!} !important;
        }
        .mini-cart-option .count{
            background: {!!$bg!!}!important;
        }
        .contact-icon:hover {
            background: {!!$bg!!}!important;
        }
        .btn-secondary:hover {
            background-color: {!!$bg!!}!important;
            border-color: {!!$bg!!}!important;
            color: #111;
        }
        .twitter-text a {
            color: {!!$bg!!}!important;
        }
        .footer-copyright a {
            color: {!!$bg!!}!important;
        }
        .tweet-time i {
            color: {!!$bg!!}!important;
        }
        .mini-cart-drop-down a.cart-button:hover {
            color: black!important;
            background: {!!$bg!!}!important;
        }
        .slick-dot-style .slick-dots li.slick-active button {
            background: {!!$bg!!}!important;
        }
        .slick-dot-style .slick-dots li button{
                border: 2px solid {!!$bg!!}!important;
        }
    </style>
    <!-- linear-icon -->
    <link rel="stylesheet" href="{{asset('template-asset/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-asset/css/linear-icon.css')}}">
    <!-- all css plugins css -->
    <link rel="stylesheet" href="{{asset('template-asset/css/plugins.css')}}">
    <!-- default style -->
    <link rel="stylesheet" href="{{asset('template-asset/css/default.css')}}">
    <!-- Main Style css -->
    <link rel="stylesheet" href="{{asset('template-asset/css/styleCoustom.css')}}">
    <link rel="stylesheet" href="{{asset('template-asset/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('template-asset/css/responsive.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    @yield('link')

    

    <!-- Modernizer JS -->
    <script src="{{asset('template-asset/js/vendor/modernizr-3.5.0.min.js')}}"></script>
</head>
<body>

    @include('layouts.header')

    @yield('content')






    
    <!-- Quick view modal start -->


<!--<div class="modal fade" id="quickk_view">
        <div class="container">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider mb-20">
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-4.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-5.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-6.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-7.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-8.jpg" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="template-asset/img/product/product-9.jpg" alt=""/>
                                    </div>
                                </div>
                                <div class="pro-nav">
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-4.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-5.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-6.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-7.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-8.jpg" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="template-asset/img/product/product-9.jpg" alt="" /></div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-inner">
                                    <div class="product-details-contentt">
                                        <div class="pro-details-name mb-10">
                                            <h3>Bose SoundLink Bluetooth Speaker</h3>
                                        </div>
                                        <div class="pro-details-review mb-20">
                                            <ul>
                                                <li>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </li>
                                                <li><a href="#">1 Reviews</a></li>
                                            </ul>
                                        </div>
                                        <div class="price-box mb-15">
                                            <span class="regular-price"><span class="special-price">£50.00</span></span>
                                            <span class="old-price"><del>£60.00</del></span>
                                        </div>
                                        <div class="product-detail-sort-des pb-20">
                                            <p>Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're not typically too concerned</p>
                                        </div>
                                        <div class="pro-details-list pt-20">
                                            <ul>
                                                <li><span>Availability :</span>In Stock</li>
                                            </ul>
                                        </div>
                                        <div class="product-availabily-option mt-15 mb-15">
                                            <h3>Available Options</h3>
                                            <div class="color-optionn">
                                                <h4><sup>*</sup>color</h4>
                                                <ul>
                                                    <li>
                                                        <a class="c-black" href="#" title="Black"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-blue" href="#" title="Blue"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-gray" href="#" title="Gray"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-red" href="#" title="Red"></a>
                                                    </li>
                                                </ul> 
                                            </div>
                                        </div>
                                        <div class="pro-quantity-box mb-30">
                                            <div class="qty-boxx">
                                                <label>qty :</label>
                                                <input type="text" placeholder="0">
                                                <button class="btn-cart lg-btn">add to cart</button>
                                            </div>
                                        </div>
                                        <div class="pro-social-sharing">
                                            <label>share :</label>
                                            <ul>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-facebook" title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                        <span>like 0</span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-twitter" title="Twitter">
                                                        <i class="fa fa-twitter"></i>
                                                        <span>tweet</span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="bg-google" title="Google Plus">
                                                        <i class="fa fa-google-plus"></i>
                                                        <span>google +</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    @include('layouts.footer')

    <!-- Quick view modal end -->



    <!-- all js include here -->
    <script src="{{asset('template-asset/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('template-asset/js/popper.min.js')}}"></script>
    <script src="{{asset('template-asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template-asset/js/plugins.js')}}"></script>
    <script src="{{asset('template-asset/js/ajax-mail.js')}}"></script>
    <script src="{{asset('template-asset/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @include('sweet::alert')

    {{-- delete item in cart --}}
    <script>
     // $(function(){ 
     //  $('#deleteItem').on("click", function () { 
     //  var id = $('#rowIdHidden').val(); 
     //  $.ajax({
     //        headers: {
     //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //        },
     //        type: 'DELETE',
     //        url: "cart/"+ id,  
     //         success: function (data) {
     //           // $('#cart_product').html(data);
     //          $("#cartSection").html("");
     //          // $("#cartSection").html(data);
     //         }               
     //    });
     //   });
     // });
</script>
    @yield('script')
</body>

</html>