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


/*INDEX*/
Route::get('/', function () {
    return view('welcome');
});

/*LOGIN*/
Route::get('/login', function () {
    return view('login');
});

/*DASHBOARD*/
Route::get('/dashboard', function () {
    return view('dashboard');
});

/*MUJERES*/
Route::get('/mujeres', function () {
    return view('mujeres');
});

/*PRODUCTOS*/
Route::get('/productos/0001', function () {
    return view('/productos/0001');
});

Route::get('/productos/0002', function () {
    return view('/productos/0002');
});

Route::get('/productos/0003', function () {
    return view('/productos/0003');
});

Route::get('/productos/0004', function () {
    return view('/productos/0004');
});

Route::get('/productos/0005', function () {
    return view('/productos/0005');
});

Route::get('/productos/0006', function () {
    return view('/productos/0006');
});

Route::get('/productos/0007', function () {
    return view('/productos/0007');
});

Route::get('/productos/0008', function () {
    return view('/productos/0008');
});

Route::get('/productos/0009', function () {
    return view('/productos/0009');
});

Route::get('/productos/0010', function () {
    return view('/productos/0010');
});

Route::get('/productos/0011', function () {
    return view('/productos/0011');
});

Route::get('/productos/0012', function () {
    return view('/productos/0012');
});

Route::get('/productos/0013', function () {
    return view('/productos/0013');
});

Route::get('/productos/0014', function () {
    return view('/productos/0014');
});

Route::get('/productos/0015', function () {
    return view('/productos/0015');
});

Route::get('/productos/0016', function () {
    return view('/productos/0016');
});

Route::get('/productos/0017', function () {
    return view('/productos/0017');
});

Route::get('/productos/0018', function () {
    return view('/productos/0018');
});

Route::get('/productos/0019', function () {
    return view('/productos/0019');
});

Route::get('/productos/0020', function () {
    return view('/productos/0020');
});

Route::get('/productos/0021', function () {
    return view('/productos/0021');
});

Route::get('/productos/0022', function () {
    return view('/productos/0022');
});

Route::get('/productos/0023', function () {
    return view('/productos/0023');
});

Route::get('/productos/0024', function () {
    return view('/productos/0024');
});

Route::get('/productos/0025', function () {
    return view('/productos/0025');
});

Route::get('/productos/0026', function () {
    return view('/productos/0026');
});

Route::get('/productos/0027', function () {
    return view('/productos/0027');
});

Route::get('/productos/0028', function () {
    return view('/productos/0028');
});

Route::get('/productos/0029', function () {
    return view('/productos/0029');
});

Route::get('/productos/0030', function () {
    return view('/productos/0030');
});