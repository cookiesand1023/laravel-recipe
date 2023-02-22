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

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    // home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // library
    Route::get('/library', [App\Http\Controllers\BookController::class, 'index'])->name('library');
    Route::post('/library', [App\Http\Controllers\BookController::class, 'create']);
    Route::delete('/library', [App\Http\Controllers\BookController::class, 'destroy']);
    Route::get('/editBook', [App\Http\Controllers\BookController::class, 'getEditData']);
    Route::put('/library', [App\Http\Controllers\BookController::class, 'update']);

    // book
    Route::get('/book', [App\Http\Controllers\RecipeController::class, 'index'])->name('book');
    Route::get('/getThumbnail', [App\Http\Controllers\RecipeController::class, 'getThumbnail']);
    Route::post('/book', [App\Http\Controllers\RecipeController::class, 'create']);
    Route::delete('/book', [App\Http\Controllers\RecipeController::class, 'destroy']);

    // recipe
    Route::get('/recipe', [App\Http\Controllers\RecipeController::class, 'showRecipe'])->name('recipe');
    Route::get('/editRecipe', [App\Http\Controllers\RecipeController::class, 'getEditData']);
    Route::put('/recipe', [App\Http\Controllers\RecipeController::class, 'update']);

    // myRecipes
    Route::get('/myRecipe', [App\Http\Controllers\myRecipeController::class, 'index'])->name('myRecipe');
    Route::post('/myRecipe', [App\Http\Controllers\RecipeController::class, 'create']);

    // allRecipes
    Route::get('/allRecipes', [App\Http\Controllers\allRecipesController::class, 'index'])->name('allRecipes');

    // othersRecipe
    Route::get('/othersRecipe', [App\Http\Controllers\RecipeController::class, 'showOthersRecipe'])->name('othersRecipe');

    // allVideos
    Route::get('/allVideos', [App\Http\Controllers\VideoController::class, 'showAllVideos'])->name('allVideos');

    // video
    Route::get('/video', [App\Http\Controllers\VideoController::class, 'showVideo'])->name('video');
    Route::post('/video', [App\Http\Controllers\RecipeController::class, 'create']);

    // setting
    Route::get('/setting', [App\Http\Controllers\UserController::class, 'index'])->name('setting');
    Route::post('/setting', [App\Http\Controllers\UserController::class, 'update']);

    // emailReset
    Route::get('/emailReset', [App\Http\Controllers\EmailResetController::class, 'index'])->name('emailReset');
    Route::post('/emailReset', [App\Http\Controllers\EmailResetController::class, 'sendChangeEmailLink']);
    Route::get('/emailReset/{token}', [App\Http\Controllers\EmailResetController::class, 'reset']);
    Route::get('/resetComplete', [App\Http\Controllers\EmailResetController::class, 'resetComplete']);

    // deleteUser
    Route::get('/deleteUser', [App\Http\Controllers\DeleteUserController::class, 'index'])->name('deleteUser');
    Route::delete('/deleteUser', [App\Http\Controllers\DeleteUserController::class, 'destroy']);

});