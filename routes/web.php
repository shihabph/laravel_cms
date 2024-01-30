<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ArticleController;
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

Route::resource('contents', ContentController::class);
// GET    /contents             - contents.index
// GET    /contents/create      - contents.create
// POST   /contents             - contents.store
// GET    /contents/{content}   - contents.show
// GET    /contents/{content}/edit - contents.edit
// PUT    /contents/{content}   - contents.update
// DELETE /contents/{content}   - contents.destroy
Route::resource('articles', ArticleController::class);