<?php

use App\Http\Controllers;
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
    return \Illuminate\Support\Facades\Redirect::route('home');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [Controllers\HomeController::class,'index'])->name('home');
Route::get('/contact', [Controllers\ContactController::class,'index'])->name('contact.index');

Route::group(['prefix' => 'phone'], function () {
    Route::get('/', [Controllers\PhoneController::class,'index'])->name('phone.index');
});

Route::group(['prefix' => '/sms'], function () {
    Route::get('/direct', [Controllers\SmsController::class,'index'])->name('sms.index');
    Route::post('/send', [Controllers\SmsController::class,'store'])->name('sms.store');
    Route::get('/schedule', [Controllers\SmsController::class,'schedule'])->name('sms.schedule');
    Route::post('/schedule', [Controllers\SmsController::class,'scheduleStore'])->name('sms.scheduleStore');
    Route::get('/scheduled', [Controllers\ScheduledSmsController::class,'index'])->name('sms.scheduled');
    Route::post('/scheduled/delete', [Controllers\ScheduledSmsController::class,'delete'])->name('sms.scheduled.delete');
    Route::get('/scheduled/{id}/edit', [Controllers\ScheduledSmsController::class,'edit'])->name('sms.scheduled.edit');
    Route::post('/scheduled/update', [Controllers\ScheduledSmsController::class,'update'])->name('sms.scheduled.update');
    Route::get('/inbox', [Controllers\InboxController::class,'index'])->name('sms.inbox');
    Route::get('/inbox/{id}/delete', [Controllers\InboxController::class,'delete'])->name('sms.inbox.delete');
    Route::get('/outbox', [Controllers\OutboxController::class,'index'])->name('sms.outbox');
    Route::get('/outbox/{id}/delete', [Controllers\OutboxController::class,'delete'])->name('sms.outbox.delete');
    Route::get('/sms-sent', [Controllers\SentController::class,'index'])->name('sms.sent');
    Route::get('/sms-sent/{id}/delete', [Controllers\SentController::class,'delete'])->name('sms.sent.delete');
});
Route::group([
    'prefix' => 'Settings',
    'as' => 'settings.',
], function () {
    route::group([
        'prefix' => 'Api',
        'as' => 'api.',
    ],function (){
        Route::get('/', [Controllers\Settings\ApiController::class, 'index'])->name('index');
        Route::post('/', [Controllers\Settings\ApiController::class, 'store']);
    });
});

