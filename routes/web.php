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

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END */
// Home
Route::get('home', 'App\Http\Controllers\Home@index');
Route::get('home/team', 'App\Http\Controllers\Home@team');
Route::get('home/tentang', 'App\Http\Controllers\Home@tentang');
Route::get('kategori', 'App\Http\Controllers\Kategori@index');
// Route::get('tutorial', 'App\Http\Controllers\Tutorial');
// Route::get('kontak', 'App\Http\Controllers\Home@kontak');
// Route::get('pemesanan', 'App\Http\Controllers\Home@pemesanan');
// Route::get('konfirmasi', 'App\Http\Controllers\Home@konfirmasi');
// Route::get('pembayaran', 'App\Http\Controllers\Home@pembayaran');
// Route::post('proses_pemesanan', 'App\Http\Controllers\Home@proses_pemesanan');
// Route::get('berhasil/{par1}', 'App\Http\Controllers\Home@berhasil');
// Route::get('cetak/{par1}', 'App\Http\Controllers\Home@cetak');
// Route::get('javawebmedia', 'App\Http\Controllers\Home@javawebmedia');
Route::get('aksi', 'App\Http\Controllers\Aksi@index');
Route::get('aksi/status/{par1}', 'App\Http\Controllers\Aksi@status');

// Post
Route::get('post', 'App\Http\Controllers\Post@index');
Route::get('post/read/{par1}', 'App\Http\Controllers\Post@read');
Route::get('post/kategori/{par1}', 'App\Http\Controllers\Post@kategori');
Route::get('post/cari', 'App\Http\Controllers\Post@cari');

/* END FRONT END */

/* BACK END */
// Login
Route::get('/', 'App\Http\Controllers\Login@index');
Route::get('login', 'App\Http\Controllers\Login@index');
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');

//user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::get('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::get('admin/user/edit/{id}', 'App\Http\Controllers\Admin\User@edit');
Route::get('admin/user/delete/{id}', 'App\Http\Controllers\Admin\User@delete');
Route::post('admin/user/proses-tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
Route::post('admin/user/proses-edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::post('admin/user/proses', 'App\Http\Controllers\Admin\User@proses');

// post
Route::get('admin/post', 'App\Http\Controllers\Admin\Post@index');
Route::get('admin/post/cari', 'App\Http\Controllers\Admin\Post@cari');
Route::get('admin/post/status_post/{par1}', 'App\Http\Controllers\Admin\Post@status_post');
Route::get('admin/post/kategori/{par1}', 'App\Http\Controllers\Admin\Post@kategori');
Route::get('admin/post/jenis_post/{par1}', 'App\Http\Controllers\Admin\Post@jenis_post');
Route::get('admin/post/author/{par1}', 'App\Http\Controllers\Admin\Post@author');
Route::get('admin/post/tambah', 'App\Http\Controllers\Admin\Post@tambah');
Route::get('admin/post/edit/{par1}', 'App\Http\Controllers\Admin\Post@edit');
Route::get('admin/post/delete/{par1}/{par2}', 'App\Http\Controllers\Admin\Post@delete');
Route::post('admin/post/tambah-proses', 'App\Http\Controllers\Admin\Post@tambah_proses');
Route::post('admin/post/edit-proses', 'App\Http\Controllers\Admin\Post@edit_proses');
Route::post('admin/post/proses', 'App\Http\Controllers\Admin\Post@proses');
Route::get('admin/post/add', 'App\Http\Controllers\Admin\Post@add');

//kategori
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::get('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::get('admin/kategori/edit/{id}', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{id}', 'App\Http\Controllers\Admin\Kategori@delete');
Route::post('admin/kategori/tambah-proses', 'App\Http\Controllers\Admin\Kategori@tambah_proses');
Route::post('admin/kategori/edit-proses', 'App\Http\Controllers\Admin\Kategori@edit_proses');

// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');

//slider
Route::get('admin/slider', 'App\Http\Controllers\Admin\Slider@index');
Route::get('admin/slider/tambah', 'App\Http\Controllers\Admin\Slider@tambah');
Route::get('admin/slider/edit/{id}', 'App\Http\Controllers\Admin\Slider@edit');
Route::get('admin/slider/delete/{id}', 'App\Http\Controllers\Admin\Slider@delete');
Route::post('admin/slider/tambah-proses', 'App\Http\Controllers\Admin\Slider@tambah_proses');
Route::post('admin/slider/edit-proses', 'App\Http\Controllers\Admin\Slider@edit_proses');
