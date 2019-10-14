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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact.index');

Route::group(['prefix' => 'phone'], function () {
    Route::get('/', 'PhoneController@index')->name('phone.index');
});

Route::group(['prefix' => '/sms'], function () {
    Route::get('/direct', 'SmsController@index')->name('sms.index'); 
    Route::post('/send', 'SmsController@store')->name('sms.store'); 
    Route::get('/schedule', 'SmsController@schedule')->name('sms.schedule');
    Route::post('/schedule', 'SmsController@scheduleStore')->name('sms.scheduleStore');
    Route::get('/scheduled', 'ScheduledSmsController@index')->name('sms.scheduled');
    Route::get('/inbox', 'InboxController@index')->name('sms.inbox');
    Route::get('/outbox', 'OutboxController@index')->name('sms.outbox');
    Route::get('/sms-sent', 'SentController@index')->name('sms.sent');
});
