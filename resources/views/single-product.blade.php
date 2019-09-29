@extends('layouts.master')

@section('link')
    {{-- <link rel="stylesheet" href="{{asset('template-asset/css/etalage.css')}}"> --}}
    <link href="{{asset('exzoom/jquery.exzoom.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')

    <!-- product details wrapper start -->
    <div class="product-details-main-wrapper pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($product->images as $image)
                                <li><img style="height: 370px !important; width: 370px !important;" src="{{asset('images/product/'.$image->name)}}" /></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form class="form-group" action="{{route('cart.add.withSize')}}" method="post">
                        @csrf
                        <div class="product-details-inner">
                            <div class="product-details-contentt">
                                <div class="pro-details-name mb-10">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <h3>{{$product->name}}</h3>
                                </div>
                                <div class="price-box mb-15">
                                    <span class="regular-price"><span class="special-price">৳ {{round($product->price_per_unit-(($product->price_per_unit*$product->discount)/100))}}</span></span>
                                    @if($product->discount>0)
                                    <span class="old-price"><del>৳{{$product->price_per_unit}}</del></span>
                                    <div class="label-product label_new mt-10" style="background: #1cb761;">
                                        <span>{{$product->discount}}% OFF</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-detail-sort-des pb-20 mt-40">
                                    <p>{!!$product->details!!}</p>
                                </div>
                                <div class="pro-details-list pt-20">
                                    <ul>
                                        @if($product->manufacture)
                                        <li><span>Manufacturer :</span>{{$product->manufacture->name}}</li>
                                        @endif
                                        
                                        <li><span>Product Code :</span>#{{$product->id}}</li>
                                        <li><span>Availability :</span>{{$product->availability ?'In Stock' : 'Out of Stock'}}</li>
                                    </ul>
                                </div>
                                <div class="product-availabily-option mt-15 mb-15">
                                    <h3>Available Options</h3>
                                    <div class="row">
                                        @if(count($product->sizes)>0)
                                        <div class="col-md-6">
                                            <div class="color-optionn">
                                                <h4><sup>*</sup>Size</h4>
                                                <ul>
                                                    @foreach($product->sizes as $size)
                                                    <div class="radio">
                                                      <label><input type="radio" name="size" value="{{$size->name}}" required> {{$size->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        @if(count($product->colors)>0)
                                        <div class="col-md-6">
                                            <div class="color-optionn">
                                                <h4><sup>*</sup>Color</h4>
                                                <ul>
                                                    @foreach($product->colors as $color)
                                                    <div class="radio">
                                                      <label><input type="radio" name="color" value="{{$color->name}}" required> {{$color->name}}</label>
                                                    </div>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="pro-quantity-box mb-30">
                                    <div class="qty-boxx">
                                        <label><sup style="color: red; font-size: 15px;">*</sup>qty :</label>
                                        <input name="qty" type="text" placeholder="0" value="" required>
                                        <button type="submit" class="btn-cart lg-btn">add to cart</button><br>
                                        @php
                                        $search='';
                                        foreach(Cart::content() as $index=> $p){
                                            if ($p->id == $product->id) {
                                                $search="Find";
                                                break;
                                            }else{
                                                $search="No";
                                            }
                                        }

                                        
                                        @endphp

                                        @if($search=='Find')

                                        <a href="{{route('checkout')}}" style="background-color: green!important;color: white;"  class="btn btn-cart btn-success lg-btn">CheckOut</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="useful-links mb-20">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    @php
                    $ads=App\SingleAd::where('note','single')->latest()->first();
                    @endphp
                    @if(isset($ads))
                    <img src="{{asset('images/banner/'.$ads->name)}}" alt="">
                    @else
                    <img src="{{asset('images/product/default.jpeg')}}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- product details wrapper end -->

    <!-- product details reviews start -->
    <div class="product-details-reviews pb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-info mt-half">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav_desctiption" data-toggle="pill" href="#tab_description" role="tab" aria-controls="tab_description" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav_review" data-toggle="pill" href="#tab_review" role="tab" aria-controls="tab_review" aria-selected="false">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav_warranty" data-toggle="pill" href="#tab_warranty" role="tab" aria-controls="tab_warranty" aria-selected="false">Warranty</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab_description" role="tabpanel" aria-labelledby="nav_desctiption">
                                <p>{!!$product->details!!}</p>
                            </div>
                            <div class="tab-pane fade" id="tab_review" role="tabpanel" aria-labelledby="nav_review">
                                <div class="product-review">
                                    {!!$product->specification!!}
                                </div> <!-- end of product-review -->
                            </div>
                            <div class="tab-pane fade" id="tab_warranty" role="tabpanel" aria-labelledby="nav_review">
                                <div class="product-review">
                                    {!!$product->warranty!!}
                                </div> <!-- end of product-review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('exzoom/jquery.exzoom.js')}}"></script>
    <script type="text/javascript">


          $("#exzoom").exzoom({
                autoPlay: true ,
                "autoPlayTimeout": 3000


            });


    </script>

    {{-- <script src="{{asset('template-asset/js/jquery.etalage.min.js')}}"></script>

    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 600,
                source_image_height: 900,
                show_hint: true,
                zoom_area_width: 800,
                zoom_area_height: 'justify',
                zoom_easing: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
    </script> --}}


@endsection