<?php

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Client;
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
Route::get( "/register", [ PageController::class, "registerOrders" ] )->name( "register" );
Route::post( "/register", function ( Request $request ) {
    $data = $request->validate( [
        "name" => "required",
        "email" => "required|email",
        "phone" => "required|unique:clients,phone",
        "password" => "required",
    ], [
        'required' => 'Обязательное поле',
        'unique' => 'Пользователь с таким телефоном уже есть',
        'email' => "Введите валидную почту"
    ] );
    $user = Client::create( $data );
    $request->session()->put( "_user", $user );
    return redirect()->route( "orders" );
} )->name( "_register" );
Route::post( "/login", function ( Request $request ) {
    $data = $request->only( "phone", "password" );
    $user = Client
        ::query()
        ->where( "phone", '=', $data[ "phone" ] )
        ->where( 'password', '=', $data[ 'password' ] )
        ->first();
    if ($user){
        $request->session()->put( "_user", $user );
        return redirect()->route( "orders" );
    }
    return redirect()->route("login")->withErrors(["credentials" => "invalid"]);
} )->name( "_login" );
Route::post( "/logout", function ( Request $request ) {
    $request->session()->flush();
    return redirect()->route( "orders" );
} )->name( "_logout" );
Route::get( '/{category?}', [ PageController::class, 'index' ] )->name( "welcome" );
