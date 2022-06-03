<?php

declare( strict_types = 1 );

use App\Orchid\Screens\CategoryScreen;
use App\Orchid\Screens\OrderScreen;
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
Route::screen( '/main', OrderScreen::class )
    ->name( 'platform.main' );

Route::screen( "/category", CategoryScreen::class )
    ->name( "platform.category" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Категории' ), route( 'platform.category' ) );
    } );

Route::screen( "/product", \App\Orchid\Screens\ProductScreen::class )
    ->name( "platform.product" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Товары' ), route( 'platform.product' ) );
    } );

Route::screen( '/product/add', \App\Orchid\Screens\ProductAddScreen::class )
    ->name( "platform.product.add" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Товары' ), route( 'platform.product' ) )
            ->push( __( 'Добавление' ), route( 'platform.product.add' ) );
    } );

Route::screen( "/product/{product}", \App\Orchid\Screens\ProductAddScreen::class )
    ->name( "platform.product.update" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Товары' ), route( 'platform.product' ) )
            ->push( __( 'Изменение' ), );
    } );

Route::screen( "/order", OrderScreen::class )
    ->name( "platform.order" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Заказы' ), route( 'platform.order' ) );
    } );

Route::screen( '/order/{order}', \App\Orchid\Screens\OrderMoreScreen::class )
    ->name( "platform.order.more" )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Заказы' ), route( 'platform.order' ) )
            ->push( __( 'Подробнее' ),);
    } );

// Platform > Profile
Route::screen( 'profile', UserProfileScreen::class )
    ->name( 'platform.profile' )
    ->breadcrumbs( function ( Trail $trail ) {
        return $trail
            ->push( __( "Домашняя страница" ), route( 'platform.main' ) )
            ->push( __( 'Профиль' ), route( 'platform.profile' ) );
    } );

