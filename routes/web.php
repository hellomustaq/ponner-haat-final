<?php

use App\Order;
use App\SingleAd;
use App\MotherCategory;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');

Route::get('login/{provider}/checkout', 'SocialController@redirect1');
Route::get('login/{provider}/callback/checkout','SocialController@Callback1');



Route::get('/', function () {
  $thinAd=SingleAd::where('note','Thin')->latest()->first();
  $motherCategory=MotherCategory::all();
  return view('welcome')->with('motherCategory',$motherCategory)->with('thinAd',$thinAd);
})->name('home');

Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/shop', function () {
    return view('shop');
});
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/search','WelcomeController@search')->name('search');
Route::post('/shop/filter','WelcomeController@filter')->name('shop-filter');
Route::get('/shop/filter/{ctype}/{bid}/{id}','WelcomeController@filterBrand')->name('shop-filter-brand');
Route::get('/shop/filter/color/{cType}/{id}/{name}','WelcomeController@filterColor')->name('shop-filter-color');
Route::get('/shop/sub-category/{id}','WelcomeController@subCategory')->name('shop-subcategory');
Route::get('/shop/category/{id}','WelcomeController@category')->name('shop-category');
Route::get('/shop/mother-category/{id}','WelcomeController@mCategory')->name('shop-mCategory');


Auth::routes(['verify' => true]);
Route::get('/logout','Auth\LoginController@logout');


Route::get('cart/add/{id}','CartController@add')->name('cart.add');
Route::post('cart/insert','CartController@addWithSize')->name('cart.add.withSize');
Route::post('cart/qty/update','CartController@qtyUpdate');
Route::post('cart/qty/delete','CartController@delete');
Route::resource('cart','CartController');


Route::resource('/users', 'UserController')->middleware('auth');
Route::resource('/invoice', 'InvoiceController')->middleware('auth');
// Route::get('users/account', 'UserController@account')->name('user.account');

Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/login','CheckoutController@doLogin')->name('checkout.login');
Route::post('/checkout/order','CheckoutController@orderOrReg')->name('checkout.order');



Route::group(['prefix'=>'customer', 'middleware' => 'user'],function(){
  Route::get('account', 'UserController@index')->name('customer.account.index');
});


//customer side product controll

Route::resource('product/show', 'CustomerProductController');


//coupon code verification
Route::post('coupon/verify', 'CheckoutController@coupon')->name('coupon.verify');
Route::get('shipping/method/{id}', 'CheckoutController@shipping')->name('shipping.method');



////////////////////////// admin route //////////////////////////

Route::group(['prefix' => 'admin','middleware' =>'admin'], function() {

    Route::get('/home', function () {
      

      

      $response = Cache::remember('response', 60, function () {
          $client = new \GuzzleHttp\Client();

        $request = $client->request('GET','https://api.openweathermap.org/data/2.5/weather?id='.config('city_id','1185241').'&appid='.config('app_id','9f91791be6542b8a59c26b698cc77193').'&units=metric');
        return $response = json_decode($request->getBody());
      });
      $orders =Order::latest()->get();
	   return view('admin.index')->with('orders',$orders)->with('response',$response);
    })->name('admin.index');

    //product route
    Route::post('products/manufacturer', 'ProductController@selectManufacturerAjax')->name('products.search.manufacturer');
    Route::post('products/category', 'ProductController@selectCategoryAjax')->name('products.search.category');
    Route::post('products/subCategory', 'ProductController@selectsubCategoryAjax')->name('products.search.subCategory');

    Route::post('products/edit/delete/imaage', 'ProductController@editDeleteImage')->name('products.edit.imgDelete');

     Route::get('products/hots/show', 'ProductController@hotShow')->name('products.hot.show');
     Route::post('products/hot', 'ProductController@hot')->name('products.hot');
     Route::post('products/hot/del', 'ProductController@delHot')->name('products.hot');
     Route::get('products/hot/delete/{id}', 'ProductController@deleteHot')->name('hot-del');

     Route::get('products/deactive/{id}', 'ProductController@deactive')->name('products.deactive');
     Route::get('products/active/{id}', 'ProductController@active')->name('products.active');
    Route::resource('/products', 'ProductController');

    //mother-category route
    Route::get('/mother-category/delete/{id}', 'MotherCategoryController@del');
    Route::resource('/mother-category', 'MotherCategoryController');

    //category route
    Route::get('/category/delete/{id}', 'CategoryController@del');
    Route::resource('/category', 'CategoryController');

    //shipping method
    Route::get('/shipping-method/delete/{id}','ShippingMethodController@destroy');
    Route::resource('/shipping-method', 'ShippingMethodController');

    //sub category route
    Route::get('sub-category/category/{id}', 'SubCategoryController@selectCategoryAjax');
    Route::get('/sub-category/delete/{id}', 'SubCategoryController@del');
    Route::resource('/sub-category', 'SubCategoryController');

    //manufacturer route
    Route::get('/manufacturer/delete/{id}', 'ManufactureController@del');
    Route::get('manufacturer/category/{id}', 'ManufactureController@selectCategoryAjax');
    Route::get('manufacturer/subCategory/{id}', 'ManufactureController@selectsubCategoryAjax');
    Route::resource('/manufacturer', 'ManufactureController');


    //setting route
    Route::resource('/setting', 'SettingController');



    //order route

    Route::get('/order/status/delete/{id}','OrderStatusController@del');
    Route::get('/order/status/ajax/del/{id}','OrderStatusController@delCheckAjax');
    Route::resource('/order/status', 'OrderStatusController');

    Route::resource('/order', 'OrderController');


    //banner route
    Route::get('/banner/del/{id}', 'BannerController@del')->name('banner.del');
    Route::resource('/banner', 'BannerController');
   


    //independent coupon route
    Route::get('/icoupon/update/coustom/{id}','IndependentCouponController@up')->name('icoupon.update.coustom');

    Route::resource('/icoupon', 'IndependentCouponController');


    //user coupon route
    Route::get('/ucoupon/update/coustom/{id}','UserCouponController@up')->name('ucoupon.update.coustom');
    Route::resource('/ucoupon', 'UserCouponController');


    Route::get('users/index' , 'UserController@showAll')->name('all-users');

    Route::get('/single-ad','BannerController@singleAd')->name('single-ad');
    
    Route::post('/single-ad/add','BannerController@singleAdPost')->name('single-ad.add');
    Route::get('/single-ad/del/{id}','BannerController@singleAdDel')->name('singleAd.del');
    Route::post('/single-ad/update/{id}','BannerController@singleAdUpdate')->name('singleAd.update');


    Route::get('/welcome-thin','BannerController@welcomeThin')->name('welcome-thin');
    Route::post('/welcome-thin/add','BannerController@welcomeThinPost')->name('welcome-thin.add');
    Route::get('/welcome-thin/del/{id}','BannerController@welcomeThinDel')->name('welcome-thin.del');
    Route::post('/welcome-thin/update/{id}','BannerController@welcomeThinUpdate')->name('welcome-thin.update');
});
