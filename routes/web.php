<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::controller(AdminController::class)->group(function () {
    Route::any('/Admin', 'login');
    Route::any('/Admin/dashboard', 'dashboard');
    Route::any('/Admin/logout', 'logout');
    Route::any('/Admin/delete', 'delete');
    Route::any('/Admin/services/{id?}', 'service');
    Route::any('/Admin/users', 'users');
    Route::any('/Admin/blogs/{id?}', 'blogs');
    Route::any('/Admin/coupons/{id?}', 'coupons');
});

Route::controller(UserController::class)->group(function () {
    Route::any('/', 'home');
    Route::any('/login', 'login');
    Route::any('/sign-up', 'signup');
    Route::any('/forgot-password', 'forgotpassword');
    Route::any('/logout', 'logout');
    Route::any('/about-us', 'aboutus');
    Route::any('/services', 'services');
    Route::any('/blogs', 'blogs');
    Route::any('/contact-us', 'contact');
    Route::any('/addtocart', 'addtocart');
    Route::any('/removecart', 'removecart');
    Route::any('/contactmessage', 'contactmessage');
    Route::any('/cart', 'cart');
    Route::any('/checkout', 'checkout');
    Route::any('/applycoupon', 'applycoupon');
    Route::any('/removecoupon', 'removecoupon');
    Route::any('/confirmation', 'confirmation');
    Route::any('/agreement', 'agreement');
    Route::any('/terms-and-condition', 'termsAndCondition');

    Route::any('/profile', 'profile');
    Route::any('/updateprofile', 'updateprofile');

    Route::any('/{url?}','index');
});