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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index.view');
Route::get('add-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::post('store-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('edit-category', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::put('update-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('destroy-category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');



Route::get('project', [App\Http\Controllers\ProjectController::class, 'index'])->name('index.home');
Route::get('add-project', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::post('store-project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::get('delete-project/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.delete');
Route::get('edit-project/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
Route::put('update-project/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');

Route::get('client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('create-client', [App\Http\Controllers\ClientController::class, 'create'])->name('client.create');
Route::post('store-client', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
Route::get('delete-client/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.delete');
Route::get('edit-client/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
Route::put('update-client/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');

Route::get('team', [App\Http\Controllers\TeamController::class, 'index'])->name('team.index');
Route::get('add-team', [App\Http\Controllers\TeamController::class, 'create'])->name('team.create');
Route::post('store-team', [App\Http\Controllers\TeamController::class, 'store'])->name('team.store');
Route::get('delete-team/{id}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('team.delete');
Route::get('edit-team/{id}', [App\Http\Controllers\TeamController::class, 'edit'])->name('team.edit');
Route::put('update-team/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('team.update');


Route::get('service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
Route::get('add-service', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
Route::post('store-service', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
Route::get('delete-service/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.delete');
Route::get('edit-service/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
Route::put('update-service/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');


Route::get('blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('add-blog', [App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
Route::post('store-blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
Route::get('delete-blog/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.delete');
Route::get('edit-blog/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
Route::put('update-blog/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');


Route::get('contactUs', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contactUs.index');
Route::get('add-contactUs', [App\Http\Controllers\ContactUsController::class, 'create'])->name('contactUs.create');
Route::post('store-contactUs', [App\Http\Controllers\ContactUsController::class, 'store'])->name('contactUs.store');
Route::get('delete-contactUs/{id}', [App\Http\Controllers\ContactUsController::class, 'destroy'])->name('contactUs.delete');
Route::get('edit-contactUs/{id}', [App\Http\Controllers\ContactUsController::class, 'edit'])->name('contactUs.edit');
Route::put('update-contactUs/{id}', [App\Http\Controllers\ContactUsController::class, 'update'])->name('contactUs.update');








