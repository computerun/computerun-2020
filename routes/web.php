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
    return view('home');
});
Route::get('/uses', function () {
    return view('uses');
});
Route::get('/sponsor-us', function () {
    return view('sponsor-us');
});
Route::get('/event-template', function () {
    return view('event-template');
});

Route::get('/bcase', function () {
    return view('bcase');
});
Route::get('/moapps', function () {
    return view('moapps');
});
Route::get('/webinar-covid', function () {
    return view('webinar-covid');
});
Route::get('/webinar-digital', function () {
    return view('webinar-digital');
});
Route::get('/webinar-mobile', function () {
    return view('webinar-mobile');
});

Route::get('/regist-new', function () {
    return view('registration.main');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/regist-webinar', function () {
    return view('regist-webinar');
});
Route::get('/regist-competition', function () {
    return view('regist-competition');
});
Route::view('userview', "registration");
Route::post('postcontroller', 'PostController@formSubmit');


// Login Views
Route::resource('/login', 'TicketStatusController');
