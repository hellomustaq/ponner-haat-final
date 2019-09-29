@extends('layouts.master')

@section('link')

@endsection

@section('content')

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
        margin-left: 10px;
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

<div class="main-wrapper pt-35">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-shop-main-wrapper mb-50">
                    <h1 style="text-align: center;">Search Result</h1>
                    {{-- <div class="shop-baner-img mb-70">
                        <a href="#"><img src="template-asset/img/banner/category-image.jpg" alt=""></a>
                    </div> --}}

                    <div class="shop-product-wrap grid row mt-20">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <div class="row">


                                @forelse($products as $product)
                                <div class="col-6 col-lg-4 col-md-4 col-sm-6">
                                    <div class="product-item mb-30">
                                        <div class="product-thumb">
                                            <a href="{{route('show.show',$product->id)}}" class="prod-img">
                                                 @if($product->images->count()<1)
                                                <img src="{{asset('images/product/product-11.jpg')}}" class="pri-img" alt="">
                                                @else
                                                <img src="{{asset('images/product/default.jpeg')}}" class="pri-img" alt="">
                                                @endif
                                            </a>
                                            <div class="box-label">
                                                @if($product->discount > 0)
                                                <div class="label-product label_sale">
                                                    <span>-{{$product->discount}}%</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-caption count-style" style="background:#e2fbff;padding: 20px 15px 23px;">

                                            <div class="product-name">
                                                <h3 style="text-align: center;"><a href="{{route('show.show',$product->id)}}">{{$product->name}}</a></h3>
                                            </div>

                                            <div class="price-box" style="text-align:center;">
                                                <span class="regular-price">
                                                    <span class="special-price">৳
                                                        {{round($product->price_per_unit-(($product->price_per_unit*$product->discount)/100))}}
                                                    </span>
                                                    <input class="price" name="price" type="hidden" value="{{round($product->price_per_unit-(($product->price_per_unit*$product->discount)/100))}}">
                                                </span>
                                                @if($product->discount > 0)
                                                <span class="old-price"><del>৳{{$product->price_per_unit}}</del></span>
                                                @endif
                                            </div>
                                            <h6 style="text-align:center;">Product Id : #{{$product->id}}</h6>
                                            @if(count($product->sizes) < 1 && count($product->colors)<1) <a href="{{route('cart.add',$product->id)}}"><button
                                                        class="btn-cart" type="button">add to cart</button></a>
                                                    @else
                                                    <a href="{{route('show.show',$product->id)}}"><button class="btn-cart"
                                                            type="button">Buy</button></a>
                                                    @endif
                                        </div>
                                    </div> <!-- end single grid item -->
                                    <div class="sinrato-list-item mb-30">
                                        <div class="sinrato-thumb">
                                            <a href="product-details.html">
                                                <img src="template-asset/img/product/product-12.jpg" class="pri-img"
                                                    alt="">
                                                <img src="template-asset/img/product/product-9.jpg" class="sec-img" alt="">
                                            </a>
                                            <div class="box-label">
                                                <div class="label-product label_sale">
                                                    <span>-10%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sinrato-list-item-content">
                                            <div class="manufacture-product">
                                                <span><a href="#">Canon</a></span>
                                            </div>
                                            <div class="sinrato-product-name">
                                                <h4><a href="product-details.html">Beats EP Wired Headphone-Black</a></h4>
                                            </div>
                                            <div class="sinrato-ratings mb-15">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                            <div class="sinrato-product-des">
                                                <p>Canon's press material for the EOS 5D states that it 'defines (a)
                                                    new D-SLR category', while we're not typically too concerned with
                                                    marketing talk this particular statement is clearly pretty
                                                    accurate...</p>
                                            </div>
                                        </div>
                                        <div class="sinrato-box-action">
                                            <div class="price-box">
                                                <span class="regular-price"><span class="special-price">£50.00</span></span>
                                                <span class="old-price"><del>£60.00</del></span>
                                            </div>
                                            <button class="btn-cart" type="button">add to cart</button>
                                            <div class="action-links sinrat-list-icon">
                                                <a href="#" title="Wishlist"><i class="lnr lnr-heart"></i></a>
                                                <a href="#" title="Compare"><i class="lnr lnr-sync"></i></a>
                                                <a href="#" title="Quick view" data-target="#quickk_view" data-toggle="modal"><i
                                                        class="lnr lnr-magnifier"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end single list item -->
                                </div>
                                @empty
                                <div class="col-md-2"></div>
                                <div class="card text-center">
                                  <div class="card-header">
                                    Ops!!
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">No Product Found</h5>
                                    <p class="card-text">Please search again with proper or first some latter of product.</p>
                                  </div>
                                  <div class="card-footer text-muted">
                                  </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>


                    </div>
{{-- 
                    <div class="pagination-area pt-35 pb-20" style="text-align: center;">

                        <div style="float: right;">{{ $products->links() }}</div>
                        <div class="clearfix"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 100000,
        values: [0, 100000],
        step: 100,

        slide: function (event, ui) {
            if (ui.values[0] == ui.values[1]) {
                return false;
            }

            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
            $('#minText').text(ui.values[0] + ' Taka');
            $('#maxText').text(ui.values[1] + ' Taka');
            $('#min').val(ui.values[0]);
        }
    });
</script>
@endsection