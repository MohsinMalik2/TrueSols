<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{id}', [HomeController::class, 'blog_detail'])->name('blog-detail');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/request-demo', [HomeController::class, 'requestDemo'])->name('request-demo');
Route::get('/coming-soon', [HomeController::class, 'comingSoon'])->name('coming-soon');
Route::get('/request-demo', [HomeController::class, 'requestDemo'])->name('request-demo');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single-blog');
Route::get('/single-portfolio', [HomeController::class, 'singlePortfolio'])->name('single-portfolio');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');
        Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio');
        Route::POST('/portfolio-form', [AdminController::class, 'portfolio_form'])->name('portfolio-form');


        /* Blog Routes */
        Route::get('/blog', [AdminController::class, 'blog'])->name('blog');

      


        /* Blog CRUD Routes */

        Route::get('/blog-new', [AdminController::class, 'blog_new'])->name('blog-new');
        Route::get('/blog-edit-form/{id}', [AdminController::class, 'blog_edit_form'])->name('blog_edit_form');
        Route::post('/blog_save', [AdminController::class, 'blog_save'])->name('blog_save');
        Route::post('/blog_edit', [AdminController::class, 'blog_edit'])->name('blog_edit');
        Route::get('/blog-delete/{id}', [AdminController::class, 'blog_delete'])->name('blog_delete');

        /* Blog CRUD Routes */



        /* Blog Routes */


        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

        

    });
});
