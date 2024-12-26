<?php

use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\be\BlogController;
use App\Http\Controllers\be\HeroController;
use App\Http\Controllers\be\TeamController;
use App\Http\Controllers\be\UserController;
use App\Http\Controllers\be\GaleryController;
use App\Http\Controllers\be\ProductController;
use App\Http\Controllers\be\ProfileController;
use App\Http\Controllers\fe\LandingController;
use App\Http\Controllers\be\DashboardController;
use App\Http\Controllers\be\BlogCategoryController;
use App\Http\Controllers\be\TestimonialsController;
use App\Http\Controllers\be\UserSettingAccountController;

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




Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/contact', [LandingController::class, 'contactIndex'])->name('landing.contactIndex');
Route::get('/about', [LandingController::class, 'aboutIndex'])->name('landing.aboutIndex');
Route::get('/product', [LandingController::class, 'productIndex'])->name('landing.productIndex');
Route::get('/testimonial', [LandingController::class, 'testimonialIndex'])->name('landing.testimonialIndex');
Route::get('/blog', [LandingController::class, 'blogIndex'])->name('landing.blogIndex');
Route::get('/blog/{slug}', [LandingController::class, 'blogDetail'])->name('landing.blogDetail');



Auth::routes(['register' => false]);

Route::get('/register', function () {
    return redirect('/login'); // Arahkan ke login
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Data User
    Route::group(['prefix' => 'be/user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('be/user.index');
        Route::post('/create', [UserController::class, 'create'])->name('be/user.create');
        Route::post('/store', [UserController::class, 'store'])->name('be/user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('be/user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('be/user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('be/user.destroy');
    });

    // Profile
    Route::group(['prefix' => 'be/profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('be/profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('be/profile.edit');
        Route::post('/store', [ProfileController::class, 'store'])->name('be/profile.store');
        Route::put('/update', [ProfileController::class, 'update'])->name('be/profile.update');
    });

    // Account Setting
    Route::group(['prefix' => 'be/account/setting'], function () {
        Route::get('/', [UserSettingAccountController::class, 'index'])->name('be/account/setting.index');
        Route::get('/edit', [UserSettingAccountController::class, 'edit'])->name('be/account/setting.edit');
        Route::put('/update', [UserSettingAccountController::class, 'update'])->name('be/account/setting.update');
    });

    // Hero
    Route::group(['prefix' => 'be/hero'], function () {
        Route::get('/', [HeroController::class, 'index'])->name('be/hero.index');
        Route::get('/preview', [HeroController::class, 'preview'])->name('be/hero.preview');
        Route::get('/create', [HeroController::class, 'create'])->name('be/hero.create');
        Route::post('/store', [HeroController::class, 'store'])->name('be/hero.store');
        Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('be/hero.edit');
        Route::put('/update/{id}', [HeroController::class, 'update'])->name('be/hero.update');
        Route::delete('/destroy/{id}', [HeroController::class, 'destroy'])->name('be/hero.destroy');
        Route::post('toggle-status/{id}', [HeroController::class, 'toggleStatus'])->name('be/hero.toggle-status');
    });

    // Teams
    Route::group(['prefix' => 'be/teams'], function () {
        Route::get('/', [TeamController::class, 'index'])->name('be/teams.index');
        Route::get('/create', [TeamController::class, 'create'])->name('be/teams.create');
        Route::post('/store', [TeamController::class, 'store'])->name('be/teams.store');
        Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('be/teams.edit');
        Route::put('/update/{id}', [TeamController::class, 'update'])->name('be/teams.update');
        Route::delete('/destroy/{id}', [TeamController::class, 'destroy'])->name('be/teams.destroy');
    });

    // Testimonial
    Route::group(['prefix' => 'be/testimonials'], function () {
        Route::get('/', [TestimonialsController::class, 'index'])->name('be/testimonials.index');
        Route::get('/create', [TestimonialsController::class, 'create'])->name('be/testimonials.create');
        Route::post('/store', [TestimonialsController::class, 'store'])->name('be/testimonials.store');
        Route::get('/edit/{id}', [TestimonialsController::class, 'edit'])->name('be/testimonials.edit');
        Route::put('/update/{id}', [TestimonialsController::class, 'update'])->name('be/testimonials.update');
        Route::delete('/destroy/{id}', [TestimonialsController::class, 'destroy'])->name('be/testimonials.destroy');
    });

    // Category Blog
    Route::group(['prefix' => 'be/blog/category'], function () {
        Route::get('/', [BlogCategoryController::class, 'index'])->name('be/blog/category.index');
        Route::get('/create', [BlogCategoryController::class, 'create'])->name('be/blog/category.create');
        Route::post('/store', [BlogCategoryController::class, 'store'])->name('be/blog/category.store');
        Route::get('/edit/{id}', [BlogCategoryController::class, 'edit'])->name('be/blog/category.edit');
        Route::put('/update/{id}', [BlogCategoryController::class, 'update'])->name('be/blog/category.update');
        Route::delete('/destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('be/blog/category.destroy');
    });

    // Blog
    Route::group(['prefix' => 'be/blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('be/blog.index');
        Route::get('/show/{id}', [BlogController::class, 'show'])->name('be/blog.show');
        Route::get('/create', [BlogController::class, 'create'])->name('be/blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('be/blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('be/blog.edit');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('be/blog.update');
        Route::delete('/destroy/{id}', [BlogController::class, 'destroy'])->name('be/blog.destroy');
    });

    // Product
    Route::group(['prefix' => 'be/product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('be/product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('be/product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('be/product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('be/product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('be/product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('be/product.destroy');
    });

    // Galery
    Route::group(['prefix' => 'be/galery'], function () {
        Route::get('/', [GaleryController::class, 'index'])->name('be/galery.index');
        Route::get('/create', [GaleryController::class, 'create'])->name('be/galery.create');
        Route::post('/store', [GaleryController::class, 'store'])->name('be/galery.store');
        Route::get('/edit/{id}', [GaleryController::class, 'edit'])->name('be/galery.edit');
        Route::put('/update/{id}', [GaleryController::class, 'update'])->name('be/galery.update');
        Route::delete('/destroy/{id}', [GaleryController::class, 'destroy'])->name('be/galery.destroy');
    });
});
