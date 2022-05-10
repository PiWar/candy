<?php

declare( strict_types = 1 );

use App\Orchid\Screens\CategoryScreen;
use App\Orchid\Screens\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen( '/main', CategoryScreen::class )
    ->name( 'platform.main' );

Route::screen( "/category", CategoryScreen::class )
    ->name( "platform.category" );

Route::screen( "/product", \App\Orchid\Screens\ProductScreen::class )
    ->name( "platform.product" );

Route::screen( '/product/add', \App\Orchid\Screens\ProductAddScreen::class )
    ->name( "platform.product.add" );

Route::screen( "/product/{product}", \App\Orchid\Screens\ProductAddScreen::class )
    ->name( "platform.product.update" );

Route::screen( "/order", \App\Orchid\Screens\OrderScreen::class )
    ->name( "platform.order" );

Route::screen( '/order/{order}', \App\Orchid\Screens\OrderMoreScreen::class )
    ->name( "platform.order.more" );

// Platform > Profile
Route::screen( 'profile', UserProfileScreen::class )
    ->name( 'platform.profile' )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->parent( 'platform.index' )
            ->push( __( 'Profile' ), route( 'platform.profile' ) );
    } );

