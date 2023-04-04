<?php
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Profile\Account;

use App\Http\Livewire\Admin\Brands\Brands;
use App\Http\Livewire\Admin\Sliders\Sliders;
use App\Http\Livewire\Admin\Brands\BrandsAdd;
use App\Http\Livewire\Admin\Brands\BrandsEdit;
use App\Http\Livewire\Admin\Products\Products;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Sliders\SlidersAdd;
use App\Http\Livewire\Admin\Dashboard\Dashboard;
use App\Http\Livewire\Admin\Sliders\SlidersEdit;
use App\Http\Livewire\Admin\Products\ProductsAdd;
use App\Http\Livewire\Admin\Products\ProductsEdit;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Categories\CategoriesAdd;
use App\Http\Livewire\Admin\Categories\CategoriesEdit;

use App\Http\Livewire\Main\Landing\Index;
use App\Http\Livewire\Main\Categories\Categories as MainCategories;
use App\Http\Livewire\Main\Categories\Category;

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
   
    //Dashboard Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', Dashboard::class)->name('admin.dashboard');
    });
   
    //Categories Routes
    Route::prefix('categories')->group(function () {
        Route::get('/', Categories::class)->name('admin.categories');
        Route::get('/add', CategoriesAdd::class)->name('admin.categories.add');
        Route::get('/edit/{slug}/{id}', CategoriesEdit::class)->name('admin.categories.edit');
    });

    // Brands Routes
    Route::prefix('brands')->group(function () {
        Route::get('/', Brands::class)->name('admin.brands');
        Route::get('/add', BrandsAdd::class)->name('admin.brands.add');
        Route::get('/edit/{slug}/{id}', BrandsEdit::class)->name('admin.brands.edit');
    });
    
    // Products Routes
    Route::prefix('products')->group(function () {
        Route::get('/', Products::class)->name('admin.products');
        Route::get('/add', ProductsAdd::class)->name('admin.products.add');
        Route::get('/edit/{slug}/{id}', ProductsEdit::class)->name('admin.products.edit');
    });

    // Sliders Routes
    Route::prefix('sliders')->group(function () {
        Route::get('/', Sliders::class)->name('admin.sliders');
        Route::get('/add', SlidersAdd::class)->name('admin.sliders.add');
        Route::get('/edit/{id}', SlidersEdit::class)->name('admin.sliders.edit');
    });

    // Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/', Settings::class)->name('admin.settings');
    });
});

//Auth Routes
Route::prefix('auth')->middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

//? Contents
Route::prefix('main')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', MainCategories::class)->name('main.categories'); //view all categories
        Route::get('/{id}/{slug}', Category::class)->name('main.category'); //view selected category
    });
});