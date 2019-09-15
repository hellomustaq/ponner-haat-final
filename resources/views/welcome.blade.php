@extends('layouts.master')

@section('style')

<style>
@media only screen and (min-width: 320px) and (max-width: 750px) { 
  /* for 10 inches tablet screens */
  #banImg{
    min-height: 165px;
  }
 
} 
</style>

@endsection

@section('content')


    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- header area start -->

    <!-- header area end -->
<style>






    .product-caption .btn-cart {
        bottom: 0px;
        opacity: 0;
        visibility: hidden;
        position: absolute;
        padding: 0;
        margin: 0;
        margin-bottom: 5px;
        box-shadow: 0px 0px 16px 0px;
    }
    .listSub {
        font-size: 15px;
        line-height: 2.5em;
        padding-left: 10px;
    }
    .listSub:hover{
        background-color: #fbe568;
    }
    .listSubHr{
        margin-top:  0px;
        margin-bottom:  0px;
        border: 0;
        border-top: 1px solid rgba(0,0,0,.1);
    }
    .d-none a{
        color: black;
    }
    .prod-img img{
        height: 200px;
        width: 100%;
    }
</style>
@php
$banner=App\Banner::all();
$bannerDub=$banner;
@endphp
    <div class="banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        @forelse($banner as $index => $banner)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$index}}" class="{{$index ==0 ?'active':''}}"></li>
                        @empty
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        @endforelse
                        
                      </ol>
                      <div class="carousel-inner">
                        @forelse($bannerDub as $index => $bannerr)

                            <div class="carousel-item {{$index ==0 ?'active':''}}">
                              <img id="banImg" class="d-block w-100" style="max-height: 480px" src="{{asset('images/banner/'.$bannerr->name)}}" alt="First slide">
                            </div>
                        @empty
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="template-asset/img/slider/slider1-home4.jpg" alt="First slide">
                              <div class="carousel-caption d-none d-md-block">
                                <h3 style="color: black;"></h3>
                              </div>
                            </div>
                        @endforelse
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- home banner statics area -->
    <br>

    {{-- <div class="banner-statics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner-statics">
                        <a href="shop-grid-left-sidebar.html"><img src="template-asset/img/banner/img1-top-sinrato3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner-statics">
                        <a href="shop-grid-left-sidebar.html"><img src="template-asset/img/banner/img2-top-sinrato3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner-statics">
                        <a href="shop-grid-left-sidebar.html"><img src="template-asset/img/banner/img3-top-sinrato3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- home banner statics end -->
    <!-- hotproduct area -->
    <div class="flas-sale-area mb-40">
        <div class="container-fluid">
            <div class="section-title" style="margin-top: 15px ! important">
                <h3><span>Hot</span> Deals </h3>
            </div>
            <div class="row">
                @php
                $hotproducts=App\Product::where('hot',true)->where('active',1)->orderBy('updated_at','DESC')->get();
                @endphp

                @foreach($hotproducts as $hotProduct)
                <div class="col-6 col-md-2 pro-col">
                    <div class="product-item mb-30">
                        <div class="product-thumb">
                            @php
                            @endphp
                                <a href="{{route('show.show',$hotProduct->id)}}" class="prod-img">
                                    @if($hotProduct->images->count()<1)
                                    <img src="{{asset('images/product/product-11.jpg')}}" class="pri-img" alt="">
                                    @else
                                    <img src="{{asset('images/product/'.$hotProduct->images->first()->name)}}" class="pri-img" alt="">
                                    @endif
                                </a>
                                <div class="box-label">
                                    @if($hotProduct->new)
                                    <div class="label-product label_new">
                                        <span>New</span>
                                    </div>
                                    @endif

                                    @if($hotProduct->discount > 0)
                                    <div class="label-product label_sale">
                                        <span>-{{$hotProduct->discount}}%</span>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        <div class="product-caption count-style" style="background:#e2fbff;padding: 20px 15px 23px;">
                            <div class="product-name">
                                <p class="pro-title" align="center"><a href="{{route('show.show',$hotProduct->id)}}">{{str_limit($hotProduct->name,15)}}</a></p>
                            </div>
                            <div class="price-box" style="text-align:center;">
                                    <span class="regular-price">
                                        <span class="special-price">৳
                                        {{round($hotProduct->price_per_unit-(($hotProduct->price_per_unit*$hotProduct->discount)/100))}}
                                        </span>
                                    </span>
                                    @if($hotProduct->discount > 0)
                                    <span class="old-price"><del>৳{{$hotProduct->price_per_unit}}</del></span>
                                    @endif
                                </div>
                            <br>
                            <div align="center">
                                @if(count($hotProduct->sizes) < 1 && count($hotProduct->colors)<1)
                                <a style="    box-shadow: 1px 1px 11px grey;" href="{{route('cart.add',$hotProduct->id)}}" class="btn theme-bg" type="button">add to cart</a>
                                @else
                                <a style="    box-shadow: 1px 1px 11px grey;" href="{{route('show.show',$hotProduct->id)}}" class="btn theme-bg" type="button">Buy</a>
                                @endif

                            </div>
                            
                        </div>
                    </div><!-- </div> end single item -->
                
                </div>
                @endforeach
            </div>
            
        </div>
    </div> 
    <!--  end hot product area-->

    {{-- category wise product --}}
@foreach($motherCategory as $mIndex => $motherCategory)


    <div class="category-wise">
        <div class="container-fluid">
            <div class="section-title">
                <a href="{{route('shop-mCategory',$motherCategory->id)}}">
                    <h3>{{$motherCategory->name}}</h3>
                </a>
            </div>
            <div class="row" style="border: 1px solid #d8d3d3; border-top:6px solid #e05488;">
                <div class="col-md-2" style="overflow-y: auto; max-height: 567px; padding:0; border-right: 1px solid gainsboro;">
                    <ul class="d-none d-sm-block">
                        @foreach($motherCategory->subCategories as $subCategory)
                        <a href="{{route('shop-subcategory',$subCategory->id)}}"><h5 class="listSub"><li>{{$subCategory->name}}</li></h5></a><hr class="listSubHr">
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-7" style="overflow-y: auto; max-height: 680px;">
                    <div class="row" >
                        @php

                        $prod=App\Product::where('mother_category_id',$motherCategory->id)->where('active',1)->orderBy('created_at','DESC')->get();
                        @endphp
                        @foreach($prod as $index=> $product)
                    
                        
                            <div class="col-6 col-md-4 pro-col">
                            <div class="product-item mb-30" style="border-radius: 0px; margin-bottom:3px;">
                            <div class="product-thumb">
                                <a href="{{route('show.show',$product->id)}}" class="prod-img">
                                    @if(isset($product->images->first()->name))
                                    <img src="{{asset('images/product/'.$product->images->first()->name)}}" class="pri-img" alt="">
                                    @else
                                    <img src="https://via.placeholder.com/150?text=Image" class="pri-img" alt="">
                                    @endif
                                </a>
                                <div class="box-label">
                                    @if($product->new)
                                    <div class="label-product label_new">
                                        <span>New</span>
                                    </div>
                                    @endif

                                    @if($product->discount > 0)
                                    <div class="label-product label_sale">
                                        <span>-{{$product->discount}}%</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="product-caption count-style" style="background:#e2fbff;padding: 20px 15px 23px;">
                                <div class="product-name">
                                    <p class="pro-title" align="center"><a href="{{route('show.show',$product->id)}}">{{str_limit($product->name,15)}}</a></p>
                                </div>
                                <div class="price-box" style="text-align:center;">
                                    <span class="regular-price">
                                        <span class="special-price">৳
                                        {{round($product->price_per_unit-(($product->price_per_unit*$product->discount)/100))}}
                                        </span>
                                    </span>
                                    @if($product->discount > 0)
                                    <span class="old-price"><del>৳{{$product->price_per_unit}}</del></span>
                                    @endif
                                </div>
                                <p style="font-size: 12px;text-align:center;">Code : #{{$product->id}}</p>

                                @if(count($product->sizes) < 1 && count($product->colors)<1)
                                <a href="{{route('cart.add',$product->id)}}"><button class="btn-cart" type="button">add to cart</button></a>
                                @else
                                <a href="{{route('show.show',$product->id)}}"><button class="btn-cart" type="button">Buy</button></a>
                                @endif
                                
                                {{-- <br>
                                <div align="center">
                                    <button  class="btn theme-bg" type="button">add to cart</button>
                                </div> --}}
                                
                            </div>
                            </div><!-- </div> end single item -->
                
                            </div>

                            @if($index==5)
                                @break
                            @endif
                        @endforeach
                        
                    </div>
                    
                </div>
                <div class="col-md-3 d-none d-sm-block" style="max-height: 650px; overflow: hidden;">
                    @php
                    $ads=App\SingleAd::where('note','single')->latest()->first();
                    @endphp
                    @if(isset($ads))
                    <img style="height: 567px;" src="{{asset('images/banner/'.$ads->name)}}" alt="">
                    @else
                    <img src="https://via.placeholder.com/400x500?text=Promotion+Image" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($mIndex==1)
    <br><br>
    <div class="banner-statics">
        <div class="container-fluid">
            <div class="single-banner-statics">
                <a>
                    @if(isset($thinAd))
                    <img src="{{asset('images/banner/'.$thinAd->name)}}" alt="">
                    @else
                    <img src="https://via.placeholder.com/1680x200?text=Promotion+Image" alt="">
                    @endif
                </a>
            </div>
        </div>
    </div>
    @endif
    <br>   

@endforeach 

    {{-- end category wise product --}}

    <!-- home banner statics area -->

    {{-- end category wise product --}}

    <!-- brand area start -->

    <!-- brand area end -->

    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> <!-- /End Scroll to Top -->







@endsection
