<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Main\Index;
use App\Http\Livewire\Admin\Sliders;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Profile\Account;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Categories\CategoriesAdd;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Main Routes
Route::get('/', Index::class)->name('index');
Route::get('/account', Account::class)->name('account')->middleware('auth');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    //Categories Routes
    Route::get('/categories', Categories::class)->name('admin.categories');
    Route::get('/categories/add', CategoriesAdd::class)->name('admin.categories.add');
    
   
    Route::get('/sliders', Sliders::class)->name('admin.sliders');

}); 

//Auth Routes
Route::prefix('auth')->middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
