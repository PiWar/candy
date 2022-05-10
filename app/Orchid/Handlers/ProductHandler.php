<?php

namespace App\Orchid\Handlers;

use App\Models\Product;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

trait ProductHandler
{

    private function getValidationRules ( bool $isRequired = true )
    {
        $rules = [
            "product.title" => "",
            "product.description" => "",
            "product.category_id" => "",
            "product.weight" => "",
            "product.price" => "",
            "product.count" => "",
            "product.image" => "|file|mimes:jpg,png,jpeg",
        ];

        return array_map( fn( $val ) => $isRequired ? "required" . $val : "nullable" . $val, $rules );

    }

    public function handleRemove ( int $id, bool|null $withRedirect )
    {
        Product::query()->find( $id )->delete();
        Alert::success( "product delete" );

        if ( $withRedirect ) return redirect()->route( "platform.product" );
    }

    public function handleSave ( Request $request )
    {
        $data = $request->validate( $this->getValidationRules() )[ "product" ];


        $data[ "image" ] = "/storage/" . $data[ "image" ]->store( "", 'public' );

        Product::create( $data );

        Alert::success( "Product created" );

        return redirect()->route( "platform.product" );
    }

    public function handleUpdate ( Request $request, int $id )
    {
        $data = $request->validate( $this->getValidationRules( false ) )[ "product" ];

        if ( array_key_exists( "image", $data ) ) {
            $data[ "image" ] = "/storage/" . $data[ "image" ]->store( "", 'public' );
        }

        Product::query()->find( $id )->update( $data );
        \alert( "successful update" );
    }

    public function handleOpenUpdate ( int $id )
    {
        return redirect()->route( "platform.product.update", [ "product" => $id ] );
    }

}
