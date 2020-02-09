<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
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

// Authentication routes.
Auth::routes();
Route::view('account', 'auth.account')->name('account')->middleware('auth');
Route::get('github/redirect', 'Auth\GithubAuthController@redirect');
Route::get('github/callback', 'Auth\GithubAuthController@callback');
Route::get('google/redirect', 'Auth\GoogleAuthController@redirect');
Route::get('google/callback', 'Auth\GoogleAuthController@callback');

// Dashboard routes.
Route::get('/', 'DashboardController@index');
