<?php

use App\Http\Controllers\Backend\PostController;
use Illuminate\Support\Facades\Route;

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
// all pages
Route::get('/','Api\Frontend\PagesController@index')->name('ecommerce.index');
Route::get('/contact-us','Api\Frontend\PagesController@contactPages')->name('contact.us');
Route::get('/about-us','Api\Frontend\PagesController@aboutPages')->name('about.us');
Route::get('/userprofile','Api\Auth\UserController@userProfile')->name('user.dashboard');
Route::get('/ordertrack','Api\Frontend\OrderController@OrderTrack')->name('order.track');
Route::get('/product/cart/checkout','Api\Frontend\PagesController@checkoutPages')->name('checkout.index');

// all pages end



// index page

Auth::routes();
// userprofile

// user update
Route::post('/userupdate/{id}','Api\Auth\UserController@userUpdate')->name('user.update');
// single product show
Route::get('/product/{slug}','Api\Frontend\ProductController@SingleProduct')->name('product.show');
// search product
Route::get('/productsearch','Api\Frontend\PagesController@searchProduct')->name('product.search');
Route::get('/subcategoryproduct/{id}','Api\Frontend\PagesController@SubCategoryProduct')->name('subcategory.product');

Route::post('/cart/store','Api\Frontend\CartController@AddCart')->name('cart.store');
Route::get('/product/cart/view','Api\Frontend\CartController@ShowAllCart')->name('cart.index');
Route::post('/cart/item/delete/','Api\Frontend\CartController@RemoveCartItem')->name('cartitem.delete');
// checkout

Route::post('/order/store','Api\Frontend\OrderController@OrderStore')->name('order.store');

// Route::get('filterprice', 
//       ['as' => 'price.filter',
//       'uses' => 'PagesController@filterPrice']);
      Route::get('filterprice','Api\Frontend\PagesController@filterPrice')->name('price.filter');
// =======frontend route=============
// Route::get('/categories','Api\Frontend\CategoriesController@Categories');
// Route::get('/categorieswithsub','Api\Frontend\CategoriesController@CategoriesWithSub');
// Route::get('/subcategories','Api\Frontend\CategoriesController@SubCategories');
// Route::get('/subcategoryproduct/{id}','Api\Frontend\ProductController@SubCategoryProduct');
// Route::get('/categoryproduct/{id}','Api\Frontend\ProductController@SubCategoryProduct');
// Route::get('/hotdeal','Api\Frontend\OfferController@hot_deal');
// Route::get('/getone','Api\Frontend\OfferController@GetOne');
// Route::get('/brands','Api\Frontend\BrandController@brands');
// Route::get('/products','Api\Frontend\ProductController@AllProduct');
// Route::get('/recentproducts','Api\Frontend\ProductController@RecentProducts');
// Route::get('/wishlist/{id}','Api\Frontend\ProductController@WishlistProduct');
// // Route::get('/addcart/{id}','Api\Frontend\CartController@AddCart');
// Route::post('/addcart/{id}','Api\Frontend\CartController@AddCart');
// Route::get('/itemremove/{id}','Api\Frontend\CartController@RemoveItem');
// Route::get('/removecart','Api\Frontend\CartController@RemoveCart');
// Route::get('/allcart','Api\Frontend\CartController@CartDetails');
// Route::get('/payments','Api\Frontend\PaymentController@AllPaymentMethod');
// Route::get('/orderdetails','Api\Frontend\OrderController@OrderDetails');
// Route::post('/order','Api\Frontend\OrderController@OrderStore');
// Route::post('/cartupdate/{id}','Api\Frontend\CartController@cartQty');

// =============frontend route=========





// ========== Backend Route===========
// admin auth
Route::get('/admin/dashboard','Auth\admin\AdminController@index')->name('admin.dashboard');

Route::get('/admin','Auth\admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Auth\admin\LoginController@login');
Route::post('admin/logout','Auth\admin\LoginController@logout')->name('admin.logout');

Route::post('/admin/password/email','Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset','Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset','Auth\admin\ResetPasswordController@reset')->name('admin.password.update');
Route::get('/admin/password/reset/{token} ','Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
// Route::group(['prefix'=>'admin', ], function(){
// Route::get('dashboard','AdminController@index')->name('admin.dashboard');
// Route::get('/','Api\Auth\admin\LoginController@showLoginForm')->name('admin.login');
// Route::post('/','Api\Auth\admin\LoginController@login');
// Route::post('logout','Api\Auth\dmin\LoginController@logout')->name('admin.logout');
// Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
// Route::get('password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::post('password/reset','ResetPasswordController@reset')->name('admin.password.update');
// Route::get('password/reset/{token} ','ResetPasswordController@showResetForm')->name('admin.password.reset');
// });

// role controller
Route::group(['prefix'=>'admin'], function(){
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});


// ecommerce backend
Route::group(['prefix'=>'admin', 'namespace'=>'Backend'], function(){
    Route::resource('brands','BrandController');
    Route::resource('colors','ColorController');
    Route::resource('sizes','ProductSizeController');
    Route::resource('categories','CategoriesController');
    Route::resource('subcategories','SubCategoryController');
    Route::resource('products','ProductController');
    Route::get('get/subcat/{id}','CategoriesController@getSubcat');
  
});


// ========== End Backend Route===========













