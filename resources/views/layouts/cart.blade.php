
                                    <a class="ha-toggle" href="#"><span class="lnr lnr-cart"></span><span class="count">{{Cart::count()}}</span>My Cart</a>
                                    <ul class="mini-cart-drop-down ha-dropdown">
                                        
                                            @foreach(Cart::content() as $product)
                                            <li class="mb-30">
                                            @php
                                                $imageCount=App\Image::where('product_id',$product->id)->count();

                                                if ($imageCount>0) {
                                                    $imageName=App\Image::where('product_id',$product->id)->first()->name;
                                                }
                                                
                                            @endphp
                                            <div class="cart-img">
                                                <a href="{{route('show.show',$product->id)}}">
                                                    @if($imageCount>0)
                                                    <img alt="" src="{{asset('images/product/'.$imageName)}}">
                                                    @else
                                                    <img alt="" src="{{asset('images/product/product-11.jpg')}}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="cart-info">
                                                <h4><a href="{{route('show.show',$product->id)}}">
                                                    {{$product->name}}
                                                    {{-- @foreach($product->options['color'] as $size)
                                                    {{$size}}
                                                    @endforeach --}}
                                                    
                                                </a></h4>
                                                <span> <span>৳{{$product->price}} X </span> {{$product->qty}}</span> =<span> ৳ {{$product->qty *$product->price}}</span>
                                            </div>
                                            <div class="del-icon">
                                                <form action="{{route('cart.destroy',$product->rowId)}}" method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <input type="hidden" id="rowIdHidden" value="{{$product->rowId}}">
                                                    <input type="submit" id="deleteItem" class="btn btn-danger btn-sm" value="X">
                                                </form>
                                                
                                            </div>
                                             </li>
                                            @endforeach
                                       
                                        <li>
                                            <div class="subtotal-text">Sub-total: </div>
                                            <div class="subtotal-price">৳ {{Cart::subtotal()}}</div>
                                        </li>
                                        <li>
                                            <div class="subtotal-text"> Tax : </div>
                                            <div class="subtotal-price">৳{{Cart::tax()}}</div>
                                        </li>
                                        <li>
                                            <div class="subtotal-text">Total: </div>
                                            <div class="subtotal-price"><span>£{{Cart::total()}}</span></div>
                                        </li>
                                        <li class="mt-30">
                                            <a class="cart-button" href="{{route('cart.index')}}">view cart</a>
                                        </li>
                                        <li>
                                            <a class="cart-button" href="{{route('checkout')}}">checkout</a>
                                        </li>
                                    </ul>
