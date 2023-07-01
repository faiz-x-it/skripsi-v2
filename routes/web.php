<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
use App\Http\Controllers\ImageUploadController;

Route::get('/photo', [ImageUploadController::class, 'preview'])->name('image.upload.preview');
Route::get('/up', [ImageUploadController::class, 'index'])->name('image-upload-preview');
Route::post('/preview-image', [ImageUploadController::class, 'save'])->name('preview-image');
Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload-image');
Route::post('/delete-image', [ImageUploadController::class, 'delete'])->name('delete-image');
Route::get('photos/{id}', [ImageUploadController::class, 'show'])->name('photo.show');



Route::get('/', 'ShopHomeController@index')->name('shop.home');

Route::get('/all', 'ShopHomeController@all')->name('all');
Route::get('/discount', 'ShopHomeController@discount')->name('discount');
Route::get('/category/{category}', 'ShopHomeController@category')->name('category');
// Route::get('/Tendor/{Tendor}', 'ShopHomeController@Tendor')->name('Tendor');


Route::get('/product/{product}', 'ShopHomeController@productDetails')->name('detail');
Route::get('/product/{id}', [ShopHomeController::class, 'productDetails'])->name('product.show');

Route::post('/product/{book}/review', 'ReviewsController@store')->name('book.review');

// Cart Route
Route::post('/cart/add', 'ShoppingCartController@add_to_cart')->name('cart.add');
Route::post('/cart/add_now', 'ShoppingCartController@add_now_to_cart')->name('cart.add_now');
Route::get('/cart/page', 'ShoppingCartController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingCartController@cart_delete')->name('cart.delete');
Route::get('/cart/increment/{id}/{qty}/{book_id}', 'ShoppingCartController@cart_increment')->name('cart.increment');
Route::get('/cart/decrement/{id}/{qty}', 'ShoppingCartController@cart_decrement')->name('cart.decrement');

Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('/cart/proceed', 'CheckoutController@store')->name('cart.proceed');
Route::get('/cart/payment', 'CheckoutController@show')->name('cart.payment');
Route::post('/cart/checkout', 'CheckoutController@pay')->name('cart.checkout');
// End of cart route

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin Route group
Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin-home', 'Admin\AdminBaseController@index')->name('admin.home');

    Route::put('/admin/books/restore/{id}', 'Admin\AdminBooksController@restore')
        ->name('book.restore');
    Route::delete('admin/books/forceDelete/{id}', 'Admin\AdminBooksController@forceDelete')
        ->name('book.forceDelete');
    Route::get('/trash-books', 'Admin\AdminBooksController@trashBooks')
        ->name('admin.trash-books');
    Route::get('admin/discount', 'Admin\AdminBooksController@discountBooks')->name('admin.discountBooks');

    Route::get('/users/{roleId?}', 'Admin\AdminUsersController@role')->name('users.role');

    Route::resource('/admin/books', 'Admin\AdminBooksController');
    Route::resource('/admin/products', 'Admin\AdminProductController');
    Route::resource('/admin/categories', 'Admin\AdminCategoriesController');
    Route::resource('/admin/tendors', 'Admin\AdminTendorsController');
    Route::resource('/admin/users', 'Admin\AdminUsersController');
    Route::resource('/admin/orders', 'Admin\AdminOrdersController');
    Route::resource('/admin/reviews', 'Admin\AdminReviewsController');
    Route::get('/user-home', 'Users\UsersBaseController@index')->name('user.home');
});
// End of admin route

// Users route group
Route::group(['middleware' => 'user'], function (){
    Route::get('/user-home', 'Users\UsersBaseController@index')->name('user.home');
    Route::get('/my-orders', 'Users\UserOrdersController@myOrders')->name('user.orders');
    Route::get('/order/details/{id}', 'Users\UserOrdersController@order_details')->name('order.details');

    Route::get('/my-reviews', 'Users\UserReviewsController@myReviews')->name('user.reviews');
    Route::delete('/review-delete/{id}', 'Users\UserReviewsController@deleteReview')->name('review.delete');
});
// End of users route

Route::get('/logout', 'CustomLogoutController@logout')->name('logout');

Route::get('/tes', function () {
    return view('tes.tes');
});
// Route::get('/tes/', 'tes@bookDetails')->name('tes');