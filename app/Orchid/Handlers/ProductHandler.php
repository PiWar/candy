<?php

namespace App\Orchid\Handlers;

use App\Models\Product;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

trait ProductHandler
{

    private array $message = [
        'required' => 'Обязательное поле',
        'file' => "Необходимо загрузить файл",
        "mimes" => "Поддерживаемые расширения файлов: jpeg, png, jpg, webp",
    ];

    private function getValidationRules ( bool $isRequired = true )
    {
        $rules = [
            "product.title" => "",
            "product.category_id" => "",
            "product.weight" => "",
            "product.price" => "",
            "product.count" => "",
            "product.image" => "|file|mimes:jpg,png,jpeg,webp",
        ];

        return array_map( fn( $val ) => $isRequired ? "required" . $val : "nullable" . $val, $rules );

    }

    public function handleRemove ( int $id, bool|null $withRedirect )
    {
        Product::query()->find( $id )->delete();
        Alert::success( "Товар удален" );

        if ( $withRedirect ) return redirect()->route( "platform.product" );
    }

    public function handleSave ( Request $request )
    {
        $data = $request->validate( $this->getValidationRules(), $this->message )[ "product" ];


        $data[ "image" ] = "/storage/" . $data[ "image" ]->store( "", 'public' );

        Product::create( $data );

        Alert::success( "Товар создан" );

        return redirect()->route( "platform.product" );
    }

    public function handleUpdate ( Request $request, int $id )
    {
        $data = $request->validate( $this->getValidationRules( false ), $this->message )[ "product" ];

        if ( array_key_exists( "image", $data ) ) {
            $data[ "image" ] = "/storage/" . $data[ "image" ]->store( "", 'public' );
        }

        Product::query()->find( $id )->update( $data );
        \alert( "Успешно обновлено" );
    }

    public function handleOpenUpdate ( int $id )
    {
        return redirect()->route( "platform.product.update", [ "product" => $id ] );
    }

}
