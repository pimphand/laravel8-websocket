<?php

use App\Events\HelloEvent;
use App\Models\User;
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

header('Access-Control-Allow-Origin:  http://localhost:4200');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
header('Access-Control-Allow-Methods:  POST, PUT');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/sender', function () {
    $count = User::count();

    // dd($count);
    $data = User::create([
        'name' => 'John Doe-' . rand(1, 100),
        'email' => rand(1, 100) . 'sda2' . rand(1, 100) . '@gmail.com',
        'password' => 'sda',
    ]);
    broadcast(new HelloEvent($data));
});



Route::get('/home', function () {
    return view('home');
});
