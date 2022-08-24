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

Route::get('/', function() {
    $data = [
        'title' => 'Login'
    ];

    return customView('auth.index', $data);
})->name('login');

Route::get('/dashboard', function() {
    $data = [
        'title' => 'Dashboard'
    ];

    return customView('dashboard.index', $data);
})->name('dashboard');

Route::get('/employee', function() {
    $data = [
        'title' => 'Dosen',
        'mods' => 'employee'
    ];

    return customView('employee.index', $data);
})->name('employee');
