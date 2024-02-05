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

Auth::routes(
    [
        'reset' => false,
        'verify' => false,
        'register' => false,
    ]
);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/laporan', 'Laporan\Laporan@index')->name('Laporan');
Route::get('/get-laporan', 'Laporan\Laporan@index')->name('GetLaporan');
 
Route::get('/',  'Survey\SurveyController@index')->name('home');
Route::get('/home',  'Survey\SurveyController@index')->name('homeSurvey');
Route::post('/kirim', 'Survey\SurveyController@kirim')->name('kirim');
