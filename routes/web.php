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
    return view('home.index');
})->name('front');

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/admin', function () {
    return view('home.admin');
});

Route::get('/request-blood', 'FrontController@requestBlood');
Route::post('/request-blood','FrontController@sendRequest')->name('send.blood.request');

Route::get('/search-donor', 'FrontController@searchDonor');
Route::post('/search-donor','FrontController@donorSearch')->name('search.nearby.donor');

Route::post('/send/message','FrontController@sendMessage')->name('send.message');
Route::get('/donor-registration','FrontController@donorRegister');
Route::post('/register/donor','FrontController@registerDonor')->name('register.donor');

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/inbox', 'HomeController@inbox')->name('inbox');
    Route::get('/view/message/{id}', 'HomeController@viewMessage')->name('viewMessage');
    Route::post('/delete-message/{id}', 'HomeController@destroyMessage')->name('delete.message');

    Route::get('search/donor','DonorController@searchDonor')->name('admin.search.donor');
    Route::post('search/donor','DonorController@search')->name('admin.donor.search');
    Route::get('blood/donors/details/{id}','DonorController@donorDetails')->name('admin.donor.details');
    Route::get('blood/donors/edit/{id}','DonorController@editDonor')->name('admin.donor.edit');
    Route::any('blood/donors/update/{id}','DonorController@updateDonorDetails')->name('admin.donor.update');

    Route::get('active/donors','DonorController@activeDonors')->name('admin.active.donor');
    Route::get('inactive/donors','DonorController@inactiveDonors')->name('admin.inactive.donor');
    Route::any('update/last/donation/date/{id}','DonorController@updateDate')->name('update.last.donation.date');
    Route::any('update/donors/status/{id}','DonorController@donorStatus')->name('update.donors.status');

    Route::get('blood/requests','DonorController@bloodRequests')->name('admin.blood.requests');
    Route::get('blood/request/details/{id}','DonorController@viewDetails')->name('admin.blood.details');
    Route::post('blood/request/status/update/{id}','DonorController@updateStatus')->name('update.bloodrequest.status');

    Route::post('search/blood/request','DonorController@searchBloodRequest')->name('search.blood.requests');

    Route::get('/view-area', 'HomeController@viewArea')->name('view.area');
    Route::post('/add-area', 'HomeController@store')->name('store.area');
    Route::post('/delete-area/{id}', 'HomeController@destroy')->name('delete.area');

    Route::get('/country', 'CountryController@index')->name('country');
    Route::get('view/country', 'CountryController@show')->name('view.country');
    Route::post('/add-country', 'CountryController@store')->name('store.country');
    Route::post('/delete-country/{id}', 'CountryController@destroy')->name('delete.country');

    Route::get('/state', 'StateController@index')->name('state');
    Route::get('view/state', 'StateController@show')->name('view.state');
    Route::post('/add-state', 'StateController@store')->name('store.state');
    Route::post('/delete-state/{id}', 'StateController@destroy')->name('delete.state');

    Route::get('/city', 'CityController@index')->name('city');
    Route::get('view/city', 'CityController@show')->name('view.city');
    Route::post('/add-city', 'CityController@store')->name('store.city');
    Route::post('/delete-city/{id}', 'CityController@destroy')->name('delete.city');
});
