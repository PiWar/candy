<?php

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
Route::get( "/orders", [ PageController::class, "orders" ] )->name( "orders" )->middleware( "orders" );
Route::get( "/login", [ PageController::class, "loginOrders" ] )->name( "login" );
Route::post( "/login", function ( Request $request ) {
    $data = $request->only( "name", "phone" );
    $data[ "name" ] = trim( $data[ "name" ] );
    $data[ "phone" ] = trim( $data[ "phone" ] );
    $request->session()->put( "_user", $data );
    return redirect()->route( "orders" );
} )->name( "_login" );
Route::post( "/logout", function ( Request $request ) {
    $request->session()->flush();
    return redirect()->route( "orders" );
} )->name( "_logout" );
Route::get( '/{category?}', [ PageController::class, 'index' ] )->name( "welcome" );
