<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return 'Karamjit Sohal';
});
Route::get('/info', function () {
    return 'Laravel makes it easy to develop websites!';
});
Route::get('/uid/{id}', function ($id) {
    return "ID: $id";
})->where('id', '[0-9]+');

Route::group(['as' => 'users.', 'prefix'=>'users', 'where' => ['user'=> '[A-Za-z ]+', 'id'=> '[0-9]+']], function(){
    Route::get('{user}', function ($user="batman") {
        return "Name: $user";
    });
    Route::get('{user}/images/{id}', function ($user, $id) {
        return "Name: $user Image: $id";
    });
});
Route::get('/aboutme', function () {
    $name = ['fullName'=> 'Karamjit S'];
    return view('pages/about', $name);
});

Route::get('/thingsiknow', function () {
    $items = ['HTML', 'CSS', 'PHP', 'C-SHARP'];
    return view('pages/langs', compact("items"));
});
Route::get('/contact', function () {
    return view('pages/contact', ['email'=>'W0811863@myscc.ca']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');
Route::get('categories/{category}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');
Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Auth::routes();
