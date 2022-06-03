<?php

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Product;
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

Route::get( '/card', [ PageController::class, "card" ] )->name( "card" );
Route::get( '/{category?}', [ PageController::class, 'index' ] )->name( "welcome" );
