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
})->name('home');

Auth::routes();
Route::get('/dashboard', 'UserDashboardController@index')->name('User Dahboard');
// Route::get('/home', 'UserDashboardController@index')->name('User Dahboard');
Route::get('/user-dashboard', 'UserDashboardController@index')->name('User Dahboard');
Route::get('/profile', 'UserDashboardController@view_profile')->name('profile');
Route::get('/packages', 'UserDashboardController@packages')->name('packages');//package
Route::post('/select','UserDashboardController@select');
Route::get('/selected_candidates','UserDashboardController@selected_candidates')->name('selected_candidates')->middleware(['WithProfile']);;
Route::post('/get_selected_candidates','UserDashboardController@get_selected_candidates')->middleware(['WithProfile']);;
Route::post('/proceed','UserDashboardController@proceed')->middleware(['WithProfile']);;
Route::post('/request_interview','UserDashboardController@request_interview')->name('request_interview')->middleware(['WithProfile']);;

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/create_profile', 'UserDashboardController@create_profile')->name('create_profile');//for client only
Route::get('/change_password', 'UserDashboardController@change_password')->name('change_password');
Route::post('/update_password', 'UserDashboardController@update_password')->name('update_password');
Route::post('/candidate_data', 'UserDashboardController@candidate_data')->name('candidate_data')->middleware(['WithProfile']);;
Route::post('/candidate_complete_data', 'UserDashboardController@candidate_complete_data')->name('candidate_complete_data')->middleware(['WithProfile']);;
Route::post('/reset_selection', 'UserDashboardController@reset_selection')->name('reset_selection')->middleware(['WithProfile']);;
Route::get('/user-profile', 'UserDashboardController@profile')->name('User Profile');//edit and creat of candidate previously created.
Route::get('/user-message', 'UserDashboardController@message')->name('User Message');
Route::get('/candidate_search_view', 'UserDashboardController@candidate_search_view')->name('candidate_search_view')->middleware(['WithProfile','role:Client']);
Route::post('/candidate_search','UserDashboardController@candidate_search')->name('candidate_search')->middleware(['WithProfile','role:Client']);;

Route::post('/user-profile-update','UserDashboardController@profile_update');

Route::delete('/delete_profile/{id}', 'UserDashboardController@delete_profile')->name('delete_profile');
Route::get('/candidate_search_view', 'UserDashboardController@candidate_search_view')->name('candidate_search_view')->middleware(['WithProfile']);
Route::post('close_browser', 'UserDashboardController@close_browser')->name('close_browser');
Route::post('login_time', 'UserDashboardController@login_time')->name('login_time');



Route::get('/admin-login', 'AdminAuth\LoginController@showLoginForm');               
Route::post('/admin-login','AdminAuth\LoginController@login');
Route::post('/admin-logout','AdminAuth\LoginController@logout');
Route::post('/admin-password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/admin-password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('/admin-password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('/admin-password/reset/{token}','AdminAuth\ResetPasswordController@showResetForm');
Route::get('/admin-register','AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin-register', 'AdminAuth\RegisterController@register');


Route::get('/mail/{id?}', 'AdminDashboardController@mail')->middleware(['role:Admin|Super Admin']);




// Route::get('/admin-dashboard', 'AdminDashboardController@index');
Route::get('/all_candidates', 'AdminDashboardController@candidates')->middleware(['role:Admin|Super Admin']);
Route::get('/admin-candidate-edit/{id}', 'AdminDashboardController@candidate_edit')->middleware(['role:Super Admin']);
Route::get('/admin-candidate-view/{id}', 'AdminDashboardController@candidate_view')->middleware(['role:Super Admin|Admin']);
Route::post('/admin_candidate_update','AdminDashboardController@candidate_update')->middleware(['role:Super Admin']);
Route::post('/view_candidates', 'AdminDashboardController@view_candidates');



Route::get('/all_clients', 'AdminDashboardController@clients')->middleware(['role:Admin|Super Admin']);
Route::get('/admin-client-edit/{id}', 'AdminDashboardController@client_edit')->middleware(['role:Super Admin']);
Route::get('/admin-client-view/{id}', 'AdminDashboardController@client_view')->middleware(['role:Super Admin|Admin']);
Route::post('/admin-client-update','AdminDashboardController@client_update')->middleware(['role:Super Admin']);
Route::post('/view_clients', 'AdminDashboardController@view_clients');
Route::post('/send_mail', 'AdminDashboardController@send_mail');




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
});

Route::post('pay', 'StripePaymentController@pay')->middleware('CanNotProceed');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');


Route::post('/contact_us','HomeController@contact_us');
Route::get('/contact','HomeController@contact')->name('contact');


Auth::routes(['verify' => true]);