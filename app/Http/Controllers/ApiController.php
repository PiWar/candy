<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{

    public function cardProducts ( Request $request )
    {
        return response()
            ->json(
                Product::query()->findMany( $request->get( "ids" ) )
            );
    }

    public function createOrder ( Request $request )
    {
        $totalPrice = 0;
        $data = $request->only( [ "user_phone", "user_name", "user_email" ] );
        $products = $request->get( "products" );

        foreach ( $products as $product ) {
            $model = Product::query()->find( (int)$product[ "id" ] );
            if ( $model->exists() ) {
                $totalPrice += $model->price * $product[ "count" ];
                $model->update( [ "count" => $model->count - $product[ 'count' ] ] );
            }

        }

        $data[ "status" ] = 0;
        $data[ "total_price" ] = $totalPrice;
        $data[ "slug" ] = Str::random( 8 );
        $order = Order::create( $data );

        foreach ( $products as $product ) {
            OrderProduct::create( [
                "product_id" => $product[ "id" ],
                "order_id" => $order->id,
                "count" => $product[ "count" ],
            ] );
        }

        return response()->json( $order );
    }

}
