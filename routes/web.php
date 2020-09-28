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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/dashboard', 'UserDashboardController@index')->name('User Dahboard');
// Route::get('/home', 'UserDashboardController@index')->name('User Dahboard');
Route::get('/user-dashboard', 'UserDashboardController@index')->name('User Dahboard');
Route::get('/profile', 'UserDashboardController@view_profile')->name('Profile');
Route::get('/packages', 'UserDashboardController@packages')->name('packages');//package
Route::post('/select','UserDashboardController@select')->middleware('CanNotProceed');
Route::get('/selected_candidates','UserDashboardController@selected_candidates')->name('selected_candidates')->middleware('CanProceed');
Route::post('/get_selected_candiates','UserDashboardController@get_selected_candiates')->middleware('CanProceed');
Route::post('/proceed','UserDashboardController@proceed');
Route::post('/request_interview','UserDashboardController@request_interview')->name('request_interview');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/create_profile', 'UserDashboardController@create_profile')->name('create_profile');//for client only
Route::get('/change_password', 'UserDashboardController@change_password')->name('change_password');
Route::post('/update_password', 'UserDashboardController@update_password')->name('update_password');
Route::post('/candidate_data', 'UserDashboardController@candidate_data')->name('candidate_data')->middleware('CanNotProceed');
Route::post('/candidate_complete_data', 'UserDashboardController@candidate_complete_data')->name('candidate_complete_data')->middleware('CanProceed');
Route::post('/reset_selection', 'UserDashboardController@reset_selection')->name('reset_selection');
Route::get('/user-profile', 'UserDashboardController@profile')->name('User Profile');//edit and creat of candidate previously created.
Route::get('/user-message', 'UserDashboardController@message')->name('User Message');
Route::get('/candidate_search_view', 'UserDashboardController@candidate_search_view')->name('candidate_search_view')->middleware('CanNotProceed');
Route::post('/candidate_search','UserDashboardController@candidate_search')->name('candidate_search')->middleware('CanNotProceed');

Route::post('/user-profile-update','UserDashboardController@profile_update');






Route::get('/admin-login', 'AdminAuth\LoginController@showLoginForm');               
Route::post('/admin-login','AdminAuth\LoginController@login');
Route::post('/admin-logout','AdminAuth\LoginController@logout');
Route::post('/admin-password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/admin-password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('/admin-password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('/admin-password/reset/{token}','AdminAuth\ResetPasswordController@showResetForm');
Route::get('/admin-register','AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin-register', 'AdminAuth\RegisterController@register');




Route::get('/admin-dashboard', 'AdminDashboardController@index');
Route::get('/admin-candidates', 'AdminDashboardController@candidates');
Route::get('/admin-candiate-edit/{id}', 'AdminDashboardController@candiate_edit');
Route::post('/admin-candiate-update','AdminDashboardController@candiate_update');



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
});

Route::post('pay', 'StripePaymentController@pay')->middleware('CanNotProceed');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

Auth::routes(['verify' => true]);