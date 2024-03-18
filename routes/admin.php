<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@getLogin']);
        Route::post('/login', ['as' => 'admin.login', 'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {

        //dashboard route
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);

        //category route
        Route::group(['prefix' => 'categories'] , function (){
            Route::get('/' , ['as' => 'admin.categories' , 'uses' => 'CategoryController@getIndex']);
            Route::post('/' , ['as' => 'admin.categories' , 'uses' => 'CategoryController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.categories.info' , 'uses' => 'CategoryController@getInfo']);
            Route::post('/edit/{id}' , ['as' => 'admin.categories.edit' , 'uses' => 'CategoryController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.categories.delete' , 'uses' => 'CategoryController@getDelete']);

            /**
             * packages routes
             */
            Route::group(['prefix' => 'packages'] , function (){
                Route::get('/{id}' , ['as' => 'admin.products' , 'uses' => 'ProductController@getIndex']);
                Route::post('/{id}' , ['as' => 'admin.products' , 'uses' => 'ProductController@postIndex']);
                Route::get('/info/{id}' , ['as' => 'admin.products.info' , 'uses' => 'ProductController@getInfo']);
                Route::post('/edit/{id}' ,['as' => 'admin.products.edit' , 'uses' => 'ProductController@postEdit']);
                Route::get('/delete/{id}' , ['as' => 'admin.products.delete' , 'uses' => 'ProductController@getDelete']);
                Route::get('/comments/all' , ['as' => 'admin.products.comments.all' , 'uses' => 'ProductCommentController@getAll']);
                /**
                 * comments routes
                 */
                Route::group(['prefix' => 'comments'] , function (){

                    Route::get('/{id}' , ['as' => 'admin.products.comments' , 'uses' => 'ProductCommentController@getIndex']);
                    Route::get('/delete/{id}' , ['as' => 'admin.products.comments.delete' , 'uses' => 'ProductCommentController@getDelete']);
                });
            });
        });

        /**
         * blog routes
         */
        Route::group(['prefix' => 'blog'] , function (){
            Route::get('/' , ['as' => 'admin.blog' , 'uses' => 'BlogController@getIndex']);
            Route::post('/' , ['as' => 'admin.blog' , 'uses' => 'BlogController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.blog.info' , 'uses' => 'BlogController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.blog.edit' , 'uses' => 'BlogController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.blog.delete' , 'uses' => 'BlogController@getDelete']);

            /**
             * comments routes
             */
            Route::group(['prefix' => 'comments'] , function (){
                Route::get('/{id}' , ['as' => 'admin.blog.comments' , 'uses' => 'BlogCommentController@getIndex']);
                Route::get('/delete/{id}' , ['as' => 'admin.blog.comments.delete' , 'uses' => 'BlogCommentController@getDelete']);
            });
        });

        /**
         * slider routes
         */
        Route::group(['prefix' => 'slider'] , function (){
            Route::get('/' , ['as' => 'admin.slide' , 'uses' => 'SliderController@getIndex']);
            Route::post('/' , ['as' => 'admin.slide' , 'uses' => 'SliderController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.slide.info' , 'uses' => 'SliderController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.slide.edit' , 'uses' => 'SliderController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.slide.delete' , 'uses' => 'SliderController@getDelete']);
        });

        /**
         * gallery routes
         */
        Route::group(['prefix' => 'gallery'] , function (){
            Route::get('/' , ['as' => 'admin.gallery' , 'uses' => 'GalleryController@getIndex']);
            Route::post('/' , ['as' => 'admin.gallery' , 'uses' => 'GalleryController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.gallery.info' , 'uses' => 'GalleryController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.gallery.edit' , 'uses' => 'GalleryController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.gallery.delete' , 'uses' => 'GalleryController@getDelete']);
        });

        /**
         * testimonials routes
         */
        Route::group(['prefix' => 'testimonials'] , function (){
            Route::get('/' , ['as' => 'admin.testimonials' , 'uses' => 'TestimonialController@getIndex']);
            Route::post('/' , ['as' => 'admin.testimonials' , 'uses' => 'TestimonialController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.testimonials.info' , 'uses' => 'TestimonialController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.testimonials.edit' , 'uses' => 'TestimonialController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.testimonials.delete' , 'uses' => 'TestimonialController@getDelete']);
        });

        /**
         * faqs routes
         */
        Route::group(['prefix' => 'faqs'] , function (){
            Route::get('/' , ['as' => 'admin.faqs' , 'uses' => 'FaqController@getIndex']);
            Route::post('/' , ['as' => 'admin.faqs' , 'uses' => 'FaqController@postIndex']);
            Route::get('/info/{id}' , ['as' => 'admin.faqs.info' , 'uses' => 'FaqController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.faqs.edit' , 'uses' => 'FaqController@postEdit']);
            Route::get('/delete/{id}' , ['as' => 'admin.faqs.delete' , 'uses' => 'FaqController@getDelete']);
        });

        //settings routes
        Route::group(['prefix' => 'site-settings'] , function (){
            Route::get('/' , ['as' => 'admin.settings' , 'uses' => 'SettingController@getIndex']);
            Route::post('/' , ['as' => 'admin.settings' , 'uses' => 'SettingController@postEdit']);
        });

        //about-us routes
        Route::group(['prefix' => 'about-us'] , function (){
            Route::get('/' , ['as' => 'admin.about' , 'uses' => 'AboutController@getIndex']);
            Route::post('/' , ['as' => 'admin.about' , 'uses' => 'AboutController@postEdit']);
        });

        //email-templates routes
        Route::group(['prefix' => 'email-templates'] , function (){
            Route::get('/' , ['as' => 'admin.templates' , 'uses' => 'EmailTemplateController@getIndex']);
            Route::post('/' , ['as' => 'admin.templates' , 'uses' => 'EmailTemplateController@postEdit']);
        });

        //subscribers routes
        Route::group(['prefix' => 'subscribers'] , function (){
            Route::get('/' , ['as' => 'admin.subscribers' , 'uses' => 'SubscribersController@getIndex']);
            Route::get('/delete/{id}' , ['as' => 'admin.subscribers.delete' , 'uses' => 'SubscribersController@getDelete']);
        });

        //users routes
        Route::group(['prefix' => 'users'] , function (){
            Route::get('/' , ['as' => 'admin.users' , 'uses' => 'UserController@getIndex']);
            Route::get('/delete/{id}' , ['as' => 'admin.users.delete' , 'uses' => 'UserController@getDelete']);
        });

        //appointments routes
        Route::group(['prefix' => 'appointments'] , function (){
            Route::get('/' , ['as' => 'admin.appointments' , 'uses' => 'BookingController@getIndex']);
            Route::get('/{id}' , ['as' => 'admin.appointments.single' , 'uses' => 'BookingController@getBooking']);
            Route::get('/delete/{id}' , ['as' => 'admin.appointments.delete' , 'uses' => 'BookingController@getDelete']);
        });

        //orders routes
        Route::group(['prefix' => 'orders'] , function (){
            Route::get('/' , ['as' => 'admin.orders' , 'uses' => 'OrderController@getIndex']);
            Route::get('/{id}' , ['as' => 'admin.orders.single' , 'uses' => 'OrderController@getOrder']);
            Route::get('/delete/{id}' , ['as' => 'admin.orders.delete' , 'uses' => 'OrderController@getDelete']);
        });

        //messages routes
        Route::group(['prefix' => 'messages'] , function (){
            Route::get('/' , ['as' => 'admin.messages' , 'uses' => 'MessageController@getIndex']);
            Route::get('/{id}' , ['as' => 'admin.messages.single' , 'uses' => 'MessageController@getMessage']);
            Route::get('/delete/{id}' , ['as' => 'admin.messages.delete' , 'uses' => 'MessageController@getDelete']);
        });
        
        /**
         * zoom meetings routes
         */
        Route::get('/zoom', ['as' => 'admin.zoom', 'uses' => 'ZoomController@getIndex']);
        Route::get('/meeting', ['as' => 'admin.meeting', 'uses' => 'ZoomController@getMeeting']);
    });
});