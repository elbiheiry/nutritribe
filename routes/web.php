<?php

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

Route::group(['namespace' => 'Site'] , function (){

    Route::group(['namespace' => 'Auth'] , function (){
        Route::get('/login' , ['as' => 'site.login' , 'uses' => 'LoginController@getLogin']);
        Route::post('/login' , ['as' => 'site.login' , 'uses' => 'LoginController@postLogin']);
        Route::get('/register' , ['as' => 'site.register' , 'uses' => 'LoginController@getRegister']);
        Route::post('/register' , ['as' => 'site.register' , 'uses' => 'LoginController@register']);
        Route::get('/logout' , ['as' => 'site.logout' , 'uses' => 'LoginController@logout']);
        Route::get('/verify/{username}' , ['as' => 'site.verify' , 'uses' => 'LoginController@getVerify']);

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    });

    /**
     * home routes
     */
    Route::get('/' ,['as' => 'site.index' , 'uses' => 'HomeController@getIndex']);
    Route::post('subscribe' , ['as' => 'site.subscribe' , 'uses' => 'HomeController@postSubscribe']);

    /**
     * contact-us routes
     */
    Route::get('/contact-us' ,['as' => 'site.contact' , 'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us' , ['as' => 'site.contact' , 'uses' => 'ContactController@postIndex']);

    /**
     * about-us routes
     */
    Route::get('/about-us' ,['as' => 'site.about' , 'uses' => 'AboutController@getIndex']);

    /**
     * categories routes
     */
    Route::group(['prefix' => 'categories'] , function (){
        Route::get('/{slug?}' , ['as' => 'site.categories' , 'uses' => 'PackageController@getIndex']);
        Route::get('/package/{slug}' , ['as' => 'site.package' , 'uses' => 'PackageController@getProduct']);
        Route::get('/info/{slug}' , ['as' => 'site.package.info' , 'uses' => 'PackageController@getInfo']);
        Route::post('add-comment/{id}' , ['as' => 'site.package.comment' , 'uses' => 'PackageController@postComment']);
    });

    /**
     * blog routes
     */
    Route::group(['prefix' => 'blog'] , function (){
        Route::get('/' ,['as' => 'site.blog' , 'uses' => 'BlogController@getIndex']);
        Route::get('/{slug}' , ['as' => 'site.blog.single' , 'uses' => 'BlogController@getBlog']);
        Route::post('/add-comment/{id}' , ['as' => 'site.blog.comment' , 'uses' => 'BlogController@postComment']);
        Route::post('/share-counter/{id}' , ['as' => 'site.blog.share' , 'uses' => 'BlogController@postUpdateShare']);
    });

    /**
     * gallery routes
     */
    Route::group(['prefix' => 'gallery'] , function (){
        Route::get('/' ,['as' => 'site.gallery' , 'uses' => 'GalleryController@getIndex']);
    });

    /**
     * faq routes
     */
    Route::group(['prefix' => 'faq'] , function (){
        Route::get('/' ,['as' => 'site.faqs' , 'uses' => 'FaqController@getIndex']);
    });

    /*
     * cart routes
     */
    Route::group(['prefix' => 'cart'] , function (){
        Route::get('/' , ['as' => 'site.cart' , 'uses' => 'CartController@getCart']);
        Route::post('/add-to-cart/{id}' , ['as' => 'site.cart.add' , 'uses' => 'CartController@postIndex']);
        Route::get('/delete/{id}' , ['as' => 'site.cart.delete' , 'uses' => 'CartController@getDeleteItem']);
    });

    /**
     * change currency route
     */
    Route::get('currency/{currency}' , ['as' => 'site.currency' , 'uses' => 'CurrencyController@getIndex']);

    /*
     * checkout routes
     */
    Route::get('/checkout' , ['as' => 'site.checkout' , 'uses' => 'CheckoutController@getIndex']);
    Route::post('/checkout' , ['as' => 'site.checkout' , 'uses' => 'CheckoutController@postIndex']);

    /**
     * paypal routes
     */
    Route::post('/create-payment', 'PaymentController@payWithpaypal')->name('create_payment');
    Route::get('/status', 'PaymentController@getPaymentStatus')->name('confirm-payment');

    /**
     * booking routes
     */
    Route::group(['prefix' => 'bookings'] , function (){
        Route::get('/' , ['as' => 'site.booking' , 'uses' => 'BookingController@getIndex']);
        Route::post('/' , ['as' => 'site.booking' , 'uses' => 'BookingController@postIndex']);
        Route::get('/mail/{id}' , ['as' => 'site.booking.mail' , 'uses' => 'BookingController@getMail']);
        Route::post('/mail/{id}' , ['as' => 'site.booking.mail' , 'uses' => 'BookingController@postOrderDetail']);
    });
    
    /**
     * zoom meetings routes
     */
    Route::get('/zoom', ['as' => 'site.zoom', 'uses' => 'HomeController@getZoom']);
    Route::get('/meeting', ['as' => 'site.meeting', 'uses' => 'HomeController@getMeeting']);
});