<?php

use App\Jobs\TestJob;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/mail', function () {
    Mail::to('loberg.matt@gmail.com')->send(new TestMail());

    return 'Message has been sent!';
});

Route::get('/queue', function () {
    TestJob::dispatch('Hello world!');

    return 'Queued message!';
});
