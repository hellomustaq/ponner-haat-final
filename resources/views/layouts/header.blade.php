@php
    $motherCategories=App\MotherCategory::all();
@endphp
<style>
.main-menu ul li ul.mega-menu li a {
    padding: 0px 0px 0px 0px;
}
.main-menu ul li ul.mega-menu li ul li a {
    padding: 0px 0;
}
.main-menu ul li ul.mega-menu.mega-full {
    margin: 0 auto;
    padding: 10px;
    width: 100%;
}
#deleteItem{
    padding: 0px 3px;
}
</style>

    <header class="header-pos">

        <div class="header-middle">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                {{-- <img style="height:60px;width:60px;" src="{{asset('images/logos/Pinjira_Logo.png')}}" alt="homepage" class="dark-logo" />  --}}
                                <img style="height:40px;width:40px;" src="{{asset('images/logos/icon-shop.png')}}" alt="homepage" class="dark-logo" /> 
                                {{-- <span style="font-size: 20px;font-weight: bolder;margin-top: 20%;color: {!!$bg!!}"> BD Soft IT</span> --}}

                                <img style="height:40px;width:100px;" src="{{asset('images/logos/ponner-haat-text.jpg')}}" alt="homepage" class="dark-logo" />

                                {{-- <img style="height:40px;width:100px;" src="{{asset('images/logos/kina_kini_logo.png')}}" alt="homepage" class="dark-logo" /> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 order-sm-last">
                        <div class="header-middle-inner">
                            <form action="{{route('search')}}" method="get">
                                @csrf
                                <input type="text" class="top-cat-field" placeholder="Search entire store heree" name="search">
                                <input type="submit"  class="top-search-btn" value="Search">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-12 col-sm-8 order-lg-last">
                        <div class="mini-cart-option">
                            <ul>
                                @if(Auth::check())
                                <li class="my-cart">
                                    <a class="ha-toggle" href="#"><span class="lnr lnr-user"></span>My Account</a>
                                    <ul class="mini-cart-drop-down ha-dropdown">
                                        <li class="mt-30">
                                            <a class="cart-button" href="{{route('customer.account.index')}}">Profile</a>
                                        </li>
                                        <li>
                                            <a class="cart-button" href="{{route('logout')}}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li class="wishlist">
                                    <a class="ha-toggle" href="{{route('login')}}"><span class="lnr lnr-lock"></span>Login </a>
                                </li>
                                <li class="wishlist">
                                    <a class="ha-toggle" href="{{route('register')}}"> <span class="lnr lnr-plus-circle"></span>Signup</a>
                                </li>
                                @endif

                                    <li class="my-cart" id="cartSection">
                                    @include('layouts.cart')

                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-menu theme-bg sticker">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top-main-menu">

                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        @foreach($motherCategories as $index=> $motherCategory)
                                        <li class="static"><a href="{{route('shop-mCategory',$motherCategory->id)}}">{{$motherCategory->name}}<span class="lnr lnr-chevron-down"></span></a>
                                            <ul class="mega-menu mega-full">
                                                @foreach($motherCategory->categories as $category)
                                                <li class="mega-title"><a href="{{route('shop-category',$category->id)}}">{{$category->name}}</a>
                                                    <ul>
                                                        @foreach($category->subCategories as $subCategory)
                                                        <li><a href="{{route('shop-subcategory',$subCategory->id)}}">{{$subCategory->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @if($index == 7)
                                            @break
                                        @endif
                                        @endforeach
                                        
                                    </ul>
                                </nav>
                            </div> <!-- </div> end main menu -->
                            <div class="header-call-action">
                                <p><span class="lnr lnr-phone"></span><strong>017######## (9AM - 10PM)</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>
                </div>
            </div>
        </div>
    </header>