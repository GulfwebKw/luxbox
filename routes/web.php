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

use App\Settings;
use Illuminate\Support\Facades\Route;


Route::get('/set-locale/{locale}', 'Front\LandingController@setLocale')->name('changeLocale');

Route::get('test', 'Front\LandingController@test');




//Login Routes
Route::get('/login', 'LoginMemberController@showLoginForm')->name('login');
Route::post('/login', 'LoginMemberController@login')->name('login.member');
Route::get('/user/logout', 'LoginMemberController@logout')->name('user.logout');
//register Routes
Route::get('/register', 'Front\RegisterMemberController@showAdminRegisterForm');
Route::post('/get-country-cities', "Front\RegisterMemberController@getCountryCities");
Route::post('/get-city-areas', "Front\RegisterMemberController@getAreas");

Route::post('register/store', 'Front\RegisterMemberController@register')->name('register.member');


//forgot member password
Route::get('forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
//contact us routers

Route::namespace('Admin')->prefix('gwc')->group(function () {
//Admin authentication
    Route::get('/', 'AdminAuthController@index');
    Route::post('/login', 'AdminAuthController@login')->name('adminLogin');
    Route::post('/logout', 'AdminAuthController@logout')->name('adminLogout');

    Route::get('/forgot', 'AdminAuthController@forgot');
    Route::post('/email', 'AdminAuthController@sendResetLinkEmail')->name('gwc.email');
    Route::get('/forgot/{token}', 'AdminAuthController@showResetForm')->name('gwc.reset');
    Route::post('/forgot/{token}', 'AdminAuthController@resetPassword')->name('gwc.token');

    //dashboard
    Route::get('/home', 'AdminDashboardController@index')->middleware('admin');
});
//admins
Route::namespace('Admin')->prefix('gwc')->middleware('admin')->group(function () {


    Route::resource('package-type', 'PackageTypeController');
    Route::get('/package-type/delete/{id}', 'PackageTypeController@destroy');
    Route::get('/package-type/ajax/{id}', 'PackageTypeController@updateStatusAjax');

    //single pages
    Route::resource('/singlepages', 'AdminSinglePagesController');
    Route::get('/singlepages/ajax/{id}', 'AdminSinglePagesController@updateStatusAjax');
    Route::post('/singlepages/{id}', 'AdminSinglePagesController@update');
    Route::get('/singlepages/deleteimage/{id}/{field}', 'AdminSinglePagesController@deleteImage');
    Route::get('/singlepages/delete/{id}', 'AdminSinglePagesController@destroy');

    //SlideShow
    Route::get('slideshows/ajax/{id}', 'SlideshowsController@updateStatusAjax');
    Route::resource('slideshows', 'SlideshowsController');
    Route::get('slideshows/delete/{id}', 'SlideshowsController@destroy');


    //orders
    Route::resource('/orders', 'AdminOrdersController');
    Route::post('/orders/ajax', 'AdminOrdersController@storeValuesInCookies');
    Route::post('/orders/reset-date-range', 'AdminOrdersController@resetDateRange');
    Route::get('/orders/{id}/view', 'AdminOrdersController@view');
    Route::post('/orders/{id}', 'AdminOrdersController@update');
    Route::get('/orders/delete/{id}', 'AdminOrdersController@destroy');

    //admin User
    Route::resource('admins', 'AdminAdminsController');
    Route::post('/admins/{id}', 'AdminAdminsController@update');
    Route::get('/admins/ajax/{id}', 'AdminAdminsController@updateStatusAjax');
    Route::get('/admins/changepass/{id}', 'AdminAdminsController@edit')->name('changePass');
    Route::post('/admins/changepass/{id}', 'AdminAdminsController@adminChangePass')->name('adminChangePass');
    Route::get('/admins/delete/{id}', 'AdminAdminsController@destroy');
    Route::get('/admins/deleteimage/{id}/{field}', 'AdminAdminsController@deleteImage');


    //contact us messages
    Route::resource('/messages', 'MessageController');
    Route::get('/messages/view/{id}', 'MessageController@view');
    Route::get('/messages/delete/{id}', 'MessageController@destroy');
    //map
    Route::resource('maps', 'MapController');
    //account Type
    Route::resource('acount-types', 'AcountTypeController');
    Route::get('acount-types/delete/{id}', 'AcountTypeController@destroy');
    Route::get('acount-types/ajax/{id}', 'AcountTypeController@updateStatusAjax');
    //duties

    Route::get('duties/ajax/{id}', 'DutiesController@updateStatusAjax');
    Route::resource('duties', 'DutiesController');
    Route::get('duties/delete/{id}', 'DutiesController@destroy');
    Route::get('/duties/deleteimage/{id}/{field}', 'DutiesController@deleteImage');
    //About us

    Route::get('abouts/ajax/{id}', 'AboutUsController@updateStatusAjax');
    Route::resource('abouts', 'AboutUsController');
    Route::get('abouts/delete/{id}', 'AboutUsController@destroy');
    Route::get('/abouts/deleteimage/{id}/{field}', 'AboutUsController@deleteImage');
    //stores

    Route::get('stores/ajax/{id}', 'StoresController@updateStatusAjax');
    Route::resource('stores', 'StoresController');
    Route::get('stores/delete/{id}', 'StoresController@destroy');
    Route::get('/stores/deleteimage/{id}/{field}', 'StoresController@deleteImage');
    //video index
    Route::get('videos/ajax/{id}', 'VideoIndexController@updateStatusAjax');
    Route::resource('videos', 'VideoIndexController');
    Route::get('videos/delete/{id}', 'VideoIndexController@destroy');
    Route::get('/videos/deleteimage/{id}/{field}', 'VideoIndexController@deleteImage');
    //blog
    Route::get('blogs/ajax/{id}', 'BlogController@updateStatusAjax');
    Route::resource('blogs', 'BlogController');
    Route::get('blogs/delete/{id}', 'BlogController@destroy');
    Route::get('/blogs/deleteimage/{id}/{field}', 'BlogController@deleteImage');
    //faq
    Route::get('faqs/ajax/{id}', 'FaqController@updateStatusAjax');
    Route::resource('faqs', 'FaqController');
    Route::get('faqs/delete/{id}', 'FaqController@destroy');
    Route::get('/faqs/deleteimage/{id}/{field}', 'FaqController@deleteImage');
    //services
    Route::get('services/ajax/{id}', 'ServiceController@updateStatusAjax');
    Route::resource('services', 'ServiceController');
    Route::get('services/delete/{id}', 'ServiceController@destroy');
    Route::get('/services/deleteimage/{id}/{field}', 'ServiceController@deleteImage');
    //How it work
    Route::get('how-it-work/ajax/{id}', 'HowItWorkController@updateStatusAjax');
    Route::resource('how-it-work', 'HowItWorkController');

    //title and header

    Route::resource('headers', 'HeaderAndTitleController');
    Route::post('headers/update/{id}', 'HeaderAndTitleController@update');
    //countries
    Route::resource('countries', 'AdminCountriesController');
    Route::get('countries/delete/{id}', 'AdminCountriesController@destroy');

    //Contact us Description

    Route::resource('contact-descrpition', 'ContactDescripitionController');
    //cities
    Route::get('/cities/ajax/{id}', 'AdminCitiesController@updateStatusAjax');
    Route::post('/cities/{id}', 'AdminCitiesController@update');
    Route::get('/cities/delete/{id}', 'AdminCitiesController@destroy');
    Route::get('/countries/{id}/cities', 'AdminCitiesController@countryCities');
    Route::resource('{id}/cities', 'AdminCitiesController');
    Route::get('{id}/cities/delete/{city}', 'AdminCitiesController@destroy');

    //Areas
    Route::get('/cities/{id}/areas', 'AdminAreasController@cityAreas');
    Route::get('/areas/ajax/{id}', 'AdminAreasController@updateStatusAjax');
    Route::post('/areas/{id}', 'AdminAreasController@update');
    Route::get('/areas/delete/{id}', 'AdminAreasController@destroy');
    Route::resource('{id}/areas', 'AdminAreasController');
    Route::get('{id}/areas/delete/{city}', 'AdminAreasController@destroy');

    //Roles
    Route::resource('/roles', 'AdminRolesController');
    Route::post('/roles/{id}', 'AdminRolesController@update');
    Route::get('/roles/delete/{id}', 'AdminRolesController@destroy');

    //settings
    Route::get('settings', 'AdminSettingsController@index');
    Route::post('/settings', 'AdminSettingsController@update')->name('settings.update');
    Route::get('/settings/deleteimage/{field}', 'AdminSettingsController@deleteImage');

    //logs
    Route::resource('/logs', 'AdminLogsController');
    Route::get('/logs/delete/{id}', 'AdminLogsController@destroy');

    //notify emails
    Route::resource('/notifyemails', 'AdminNotifyEmailsController');
    Route::get('/notifyemails' . '/ajax/{id}', 'AdminNotifyEmailsController@updateStatusAjax');
    Route::post('/notifyemails' . '/{id}', 'AdminNotifyEmailsController@update');
    Route::get('/notifyemails' . '/delete/{id}', 'AdminNotifyEmailsController@destroy');

    //subjects
    Route::resource('/subjects', 'AdminSubjectsController');
    Route::get('/subjects/ajax/{id}', 'AdminSubjectsController@updateStatusAjax');
    Route::post('/subjects/{id}', 'AdminSubjectsController@update');
    Route::get('/subjects/delete/{id}', 'AdminSubjectsController@destroy');

    //users
    Route::resource('users', 'AdminUsersController');
    Route::get('users/delete/{id}', 'AdminUsersController@destroy');
        Route::get('/users/ajax/{id}', 'AdminUsersController@updateStatusAjax');

    Route::get('users/changepass/{id}', 'AdminUsersController@edit')->name('changePass');
    Route::post('users/changepass/{id}', 'AdminUsersController@userChangePass')->name('userChangePass');
    Route::get('/users/deleteimage/{id}/{field}', 'AdminUsersController@deleteImage');

    //web push
    Route::post('/webpush/save', 'webPushController@saveWebPush')->name('savePush');
    Route::post('/webpush/saveEdit/{id}', 'webPushController@saveEditWebPush')->name('saveEdit');
    Route::get('/webpush/delete/{id}', 'webPushController@destroyWebPushs');
    Route::get('/webpush/devicetokens', 'webPushController@devicetokens');
    Route::get('/webpush/devicetokens/delete/{id}', 'webPushController@deletedevicetokens');
    Route::resource('webpush', 'webPushController');
    Route::get('/web_push_token_save', 'webPushController@saveToken');

    //categories
    Route::resource('categories', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@destroy');
    Route::get('category/ajax/{id}', 'CategoryController@updateStatusAjax');

    //packages
    Route::resource('packages', 'PackageController');
    Route::get('packages/delete/{id}', 'PackageController@destroy');
    Route::get('packages/ajax/{id}', 'PackageController@updateStatusAjax');
    Route::post('packages/change-status/{id}', 'PackageController@changeOrderStatus')->name('package.change-status');

    //shipping methods
    Route::resource('shipping-method', 'shippingMethodController');
    Route::get('shipping-method/delete/{id}', 'shippingMethodController@destroy');
Route::get('shipping-method/ajax/{id}', 'shippingMethodController@updateStatusAjax');

    Route::resource('package-invoice', 'PackageInvoiceController');
    Route::get('package-invoice/delete/{id}', 'PackageInvoiceController@destroy');

    Route::resource('order-status', 'orderStatusController');
    Route::get('order-status/delete/{id}', 'orderStatusController@destroy');
Route::get('order-status/ajax/{id}', 'orderStatusController@updateStatusAjax');

    Route::get('package/delete/{id}', 'CategoryController@destroy');
    Route::get('packages/ajax/{id}', 'CategoryController@updateStatusAjax');


});

Route::post('/dropzone/image', 'DropzoneController@store')->name('dropzone.images.store');
Route::post('/dropzone/image/delete', 'DropzoneController@destroy')->name('dropzone.image.delete');
Route::post('/dropzone/image/remove', 'DropzoneController@store')->name('dropzone.images.remove');

Route::post('/gwc/get-country-cities', "WebController@getCountryCities");
Route::post('/gwc/get-country-cities-edit', "WebController@getCountryCitiesEdit");
Route::post('/gwc/get-city-areas', "WebController@getAreas");


//////////////////////////////////////////////////WEBSITE//////////////////////////////////////////////////


Route::namespace('Front')->middleware('auth:member')->group(function () {

    Route::get('/my-account', 'AccountInformation@index')->name('my-account');
    Route::get('/account-information', 'AccountInformation@acountInformation')->name('account-information');
    Route::get('/shipped-packages', 'AccountInformation@shippedPackages')->name('shipped-packages');
    Route::get('/view-order/{id}', 'AccountInformation@viewOrder')->name('view-order');
    Route::get('invoices', 'AccountInformation@invoices')->name('invoices');
    Route::get('show-invoices/{id}', 'AccountInformation@showInvoices')->name('invoices.show');

    Route::post("/payment", "PaymentController@payment")->name('payment');

//    Route::get('/my-account', function () {
//        $setting = Settings::where("keyname", "setting")->first();
//        return view('member.my-account', compact('setting'));
//    })->name('my-account');
});


Route::namespace('Front')->group(function () {

    Route::get('/', 'LandingController@index');
    Route::get('/shipping', 'shippingController@index');
    Route::get('/works', 'HowToWorksControllers@index');
    Route::get('/services', 'ServicesController@index');
    Route::get('/service/{id}', 'ServicesController@show')->name('service');
    Route::get('/about-us', 'AboutUsController@index');
    Route::get('/stores', 'StoresController@index');
    Route::get('/faq', 'faqController@index');
    Route::get('/blog', 'BlogController@index');
    Route::get('/blog/{id}', 'BlogController@show')->name('blog');
    Route::get('/contact-us', 'ContactUsController@index');
    Route::post('/contact-us/store', 'ContactUsController@store')->name('store.message');
    Route::get('refresh_captcha', 'ContactUsController@refreshCaptcha')->name('refresh_captcha');

    Route::get("/payment/response", "PaymentController@PaymentResponse");
    Route::get("/payment/return", "PaymentController@PaymentReturn")->name('invoices.return');

});
