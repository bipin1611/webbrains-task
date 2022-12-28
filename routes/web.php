<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\CustomerController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/customer/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerLoginController::class, 'login'])->name('customer.login.post');
Route::get('/customer/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');
Route::get('/customer/profile', [CustomerLoginController::class, 'profile'])->name('customer.profile')->middleware('auth:customer');


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin','middleware' =>'auth:admin'], function () {


    // customers
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers');
    Route::get('create/customer', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('create/customer', [CustomerController::class, 'store'])->name('admin.customers.create.post');
    Route::get('edit/customer/{customer}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::post('edit/customer/{customer}', [CustomerController::class, 'update'])->name('admin.customers.edit.post');
    Route::post('delete/customers', [CustomerController::class, 'destroy'])->name('admin.delete.customers');
    Route::post('customer/change/status/{customer}', [CustomerController::class, 'changeStatus'])->name('admin.change.status.customers');


});
