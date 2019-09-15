        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div style="overflow: auto!important;" class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="{{asset('images/logos/kina_kini_logo1.png')}}" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                
                                <!-- text-->
                                <a href="{{route('logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- Main</li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.index')}}">Index</a></li>
                                
                               
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Customers</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('all-users')}}">All List</a></li>
                               
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Order</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('order.index')}}">Orders</a></li>
                                <li><a href="{{route('status.index')}}">Order Status</a></li>
                                <li><a href=""></a></li>
                               
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Product</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('products.create')}}">Add Product</a></li>
                                <li><a href="{{route('products.index')}}">Show All Product</a></li>
                                <li><a href="{{route('products.hot.show')}}">HotProducts</a></li>
                            </ul>
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Category</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('mother-category.index')}}">Add Mother Category</a></li>
                                <li><a href="{{route('category.create')}}">Add Category</a></li>
                                <li><a href="{{route('sub-category.create')}}">Add Sub Category</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Manufacturer</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('manufacturer.create')}}">Add Manufacturer</a></li>
                                
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Shipping Method</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('shipping-method.index')}}">show all method</a></li>
                                <li><a href="{{route('shipping-method.create')}}">Add method</a></li>
                                
                            </ul>
                        </li>

                        <li class="nav-small-cap">--- Promotion / Coupon</li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Coupon</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('icoupon.create')}}">create coupon</a></li>
                                <li><a href="{{route('icoupon.index')}}">All Coupons</a></li>
                                
                            </ul>
                        </li>


                        <li class="nav-small-cap">--- Setting </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Banner</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('banner.create')}}">Add  slider</a></li>
                                <li><a href="{{route('banner.index')}}">All slider</a></li>
                                
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Single Ad</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('single-ad')}}">show ads</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">index Page Banner</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('welcome-thin')}}">Show banner</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Theme Color</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('setting.create')}}">Add  color</a></li>

                                
                            </ul>
                        </li>
                            
                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('logout')}}" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>