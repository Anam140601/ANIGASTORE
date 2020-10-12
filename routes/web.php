<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontController@index');
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');
        //login with google
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');



//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


// Admin Menu
        // categories
Route::get('admin/categories', 'Admin\CategoryController@index')->name('categories');
Route::post('admin/store/category', 'Admin\CategoryController@store')->name('store.category');
Route::get('delete/category/{id}', 'Admin\CategoryController@destroy');
Route::get('edit/category/{id}', 'Admin\CategoryController@edit');
Route::post('update/category/{id}', 'Admin\CategoryController@update');
        //brand
Route::get('admin/brands', 'Admin\BrandController@index')->name('brands');
Route::post('admin/store/brand', 'Admin\BrandController@store')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\BrandController@destroy');
Route::get('edit/brand/{id}', 'Admin\BrandController@edit');
Route::post('update/brand/{id}', 'Admin\BrandController@update');
        //suubcategories
Route::get('admin/subcategories', 'Admin\SubcategoryController@index')->name('subcategories');
Route::post('admin/store/subcategory', 'Admin\SubcategoryController@store')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\SubcategoryController@destroy');
Route::get('edit/subcategory/{id}', 'Admin\SubcategoryController@edit');
Route::post('update/subcategory/{id}', 'Admin\SubcategoryController@update');
        // show category with ajax
Route::get('/get/subcategory/{category_id}', 'Admin\ProductController@getSubCat');
        // coupons
Route::get('admin/coupons', 'Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\CouponController@store')->name('store.coupon');
Route::get('delete/coupons/{id}', 'Admin\CouponController@destroy');
Route::get('edit/coupons/{id}', 'Admin\CouponController@edit');
Route::post('update/coupons/{id}', 'Admin\CouponController@update');
        // newslaters
Route::get('admin/newslater', 'Admin\OtherController@newslater')->name('admin.newslater');
Route::get('delete/sub/{id}', 'Admin\OtherController@destroySub');
        // seo Settijng
Route::get('admin/seo', 'Admin\OtherController@seo')->name('admin.seo');
Route::post('admin/seo/update', 'Admin\OtherController@seoUpdate')->name('update.seo');
        // product
Route::get('admin/products', 'Admin\ProductController@index')->name('products');
Route::get('admin/products/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('delete/product/{id}', 'Admin\ProductController@destroy');
Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('view/product/{id}', 'Admin\ProductController@show');
Route::get('edit/product/{id}', 'Admin\ProductController@edit');
Route::post('update/product/withoutimg/{id}', 'Admin\ProductController@updateWithoutImg');
Route::post('update/product/image/{id}', 'Admin\ProductController@updateImg');
        // blog category
Route::get('blog/category/list', 'Admin\PostController@categoryList')->name('add.blog.categorylist');
Route::post('admin/store/blog/category', 'Admin\PostController@storeCategory')->name('store.blog.category');
Route::get('delete/blog/category/{id}', 'Admin\PostController@destroyCategory');
Route::get('edit/blog/category/{id}', 'Admin\PostController@editCategory');
Route::post('update/blog/category/{id}', 'Admin\PostController@updateCategory');
        // blog post
Route::get('admin/post/all', 'Admin\PostController@index')->name('blog.posts');
Route::get('admin/post/add', 'Admin\PostController@create')->name('add.posts');
Route::post('admin/post/store', 'Admin\PostController@store')->name('store.post');
Route::get('delete/post/{id}', 'Admin\PostController@destroy');
Route::get('edit/post/{id}', 'Admin\PostController@edit');
Route::post('update/post/{id}', 'Admin\PostController@update');
        //order
Route::get('admin/pending/order', 'Admin\OrderController@newOrder')->name('admin.new.order');
Route::get('admin/accept/order', 'Admin\OrderController@acceptOrder')->name('admin.accept.order');
Route::get('admin/progres/order', 'Admin\OrderController@progresOrder')->name('admin.progres.order');
Route::get('admin/delivered/order', 'Admin\OrderController@deliveredOrder')->name('admin.delivered.order');
Route::get('admin/cancel/order', 'Admin\OrderController@cancelOrder')->name('admin.cancel.order');
Route::get('admin/view/order/{id}', 'Admin\OrderController@viewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@accept');
Route::get('admin/delivery/process/{id}', 'Admin\OrderController@process');
Route::get('admin/delivery/done/{id}', 'Admin\OrderController@done');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@cancel');
        // report
Route::get('admin/today/order', 'Admin\ReportController@todayOrder')->name('today.order');
Route::get('admin/today/delivered', 'Admin\ReportController@todaydelivered')->name('today.delivered');
Route::get('admin/this/mounth', 'Admin\ReportController@thismounth')->name('this.mounth');
Route::get('admin/search/report', 'Admin\ReportController@searchreport')->name('search.report');
Route::post('admin/search/by/year', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/by/month', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/by/date', 'Admin\ReportController@searchByDate')->name('search.by.date');
        // admin role route
Route::get('admin/user/all', 'Admin\UserRoleController@index')->name('admin.all.user');
Route::post('admin/user/store', 'Admin\UserRoleController@store')->name('store.admin');
Route::get('admin/edit/{id}', 'Admin\UserRoleController@edit');
Route::post('admin/user/update', 'Admin\UserRoleController@update')->name('update.admin');
Route::get('admin/delete/{id}', 'Admin\UserRoleController@destroy');
        // site setting
Route::get('admin/site/setting', 'Admin\SettingController@index')->name('admin.site.setting');
Route::post('admin/site/update', 'Admin\SettingController@update')->name('update.site.setting');
        // return 
Route::get('admin/return/approve/{id}', 'Admin\ReturnController@approve');
Route::get('admin/return/all', 'Admin\ReturnController@index')->name('admin.return.all');
        // stock
Route::get('admin/product/stock', 'Admin\ProductController@stock')->name('admin.product.stock');
        //contact
Route::get('admin/all/message', 'ContactController@allMessage')->name('all.message');


        // frontend 
Route::post('store/newslater', 'FrontController@storeNewslater')->name('store.newslater');

        //wishlist
Route::get('add/wishlist/{id}', 'WishlistController@add');
Route::get('user/wishlist/', 'WishlistController@show')->name('user.wishlist');
        // add to cart
Route::get('add/to/cart/{id}', 'CartController@add');
Route::get('check', 'CartController@check');
Route::get('product/cart', 'CartController@show')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@remove');
Route::post('update/cart/item', 'CartController@update')->name('update.cartItem');
Route::get('/cart/product/view/{id}', 'CartController@view');
Route::post('insert/into/cart', 'CartController@insert')->name('insert.into.cart');
        // product detail
Route::get('product/details/{id}/{name}', 'ProductController@viewProduct');
Route::post('/cart/product/add/{id}', 'ProductController@addProductCart');
Route::get('products/{id}', 'ProductController@productView');
Route::get('all/category/{id}', 'ProductController@categoryView');
        //checkout
Route::get('/user/checkout/', 'CartController@checkout')->name('user.checkout');
Route::post('user/apply/coupon/', 'CartController@applyCoupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@removeCoupon')->name('coupon.remove');
        // Payment
Route::get('payment/page/', 'PaymentController@paymenPage')->name('payment.step');
Route::post('user/payment/process', 'PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge', 'PaymentController@stripeCharge')->name('stripe.charge');
        //tracking
Route::post('order/tracking', 'FrontController@tracking')->name('order.tracking');
        // return order
Route::get('success/list', 'FrontController@returnView')->name('success.order.list');
Route::get('request/return/{id}', 'FrontController@returnRequest');
        //contacy
Route::get('contact/page', 'ContactController@index')->name('user.contact.page');
Route::post('contact/form', 'ContactController@store')->name('contact.form');
        //search
Route::post('product/search', 'ProductController@search')->name('product.search');