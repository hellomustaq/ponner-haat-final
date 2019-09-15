@extends('layouts.master')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
@endsection
@section('content')
    <div class="shopping-cart-wrapper pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="primary" class="site-main">
                        <div class="shopping-cart">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="section-title">
                                        <h3>Shopping Cart</h3>
                                    </div>
                                    <form action="#">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>Product Name</td>
                                                        <td>Model</td>
                                                        <td>Quantity</td>
                                                        <td>Unit Price</td>
                                                        <td>Total</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(Cart::content() as $index=> $product)
                                                    <tr>
                                                        <td>
                                                            @php
                                                                $imageName=App\Image::where('product_id',$product->id)->first()->name;
                                                            @endphp
                                                            <a href=""><img src="{{asset('images/product/'.$imageName)}}" alt="Cart Product Image" title="Compete Track Tote" class="img-thumbnail"></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('show.show',$product->id)}}">{{$product->name}}</a>
                                                            @if($product->options->size)
                                                            <span>Size: {{$product->options->size}}</span>
                                                            @endif
                                                            @if($product->options->color)
                                                            <span>Color: {{$product->options->color}}</span>
                                                            @endif
                                                        </td>
                                                        <td>3</td>
                                                        <td>
                                                            <div class="input-group btn-block">
                                                                <div class="product-qty mr-3">
                                                                    <input id="qtyup{{$index}}" type="text" value="{{$product->qty}}">
                                                                </div>
                                                                <span class="input-group-btn">
                                                                    <button id="qtyUpdate" data-index="{{$index}}" data-row="{{$product->rowId}}" data-qty="{{$product->qty}}" type="button" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                                                    <button id="del" data-row="{{$product->rowId}}" type="button" class="btn btn-danger pull-right"><i class="fa fa-times-circle"></i></button>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>{{$product->price}}</td>
                                                        <td>{{$product->qty*$product->price}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>

                                    <div class="cart-amount-wrapper">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4 offset-md-8">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Sub-Total:</strong></td>
                                                            <td>{{Cart::subtotal()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Total:</strong></td>
                                                            <td><span class="color-primary">{{Cart::total()}}</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-button-wrapper d-flex justify-content-between mt-4">
                                        <a href="{{url('/')}}" class="btn btn-secondary">Continue Shopping</a>
                                        <a href="{{route('checkout')}}" class="btn btn-secondary dark align-self-end">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of shopping-cart -->
                    </main> <!-- end of #primary -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
@endsection

@section('script')

<script>
    $(document).on('click', '#qtyUpdate', function(el) {
        el.preventDefault();
       
        var rowId=$(this).data("row");
        var index=$(this).data("index");
         var qty=$('#qtyup'+index).val();

        console.log(rowId);
        console.log(qty);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{qty:qty,rowId:rowId},
            method:"POST",
            url: `cart/qty/update`,
            success: function(data){
               if(data.success == true){ // if true (1)
                  setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 0); 
               }
            }
        });
    });

    $(document).on('click', '#del', function(el) {
        el.preventDefault();
        var rowId=$(this).data("row");
        console.log(rowId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{rowId:rowId},
            method:"POST",
            url: `cart/qty/delete`,
            success: function(data){
               if(data.success == true){ // if true (1)
                  setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 0); 
               }
            }
        });
    });
</script>
@endsection