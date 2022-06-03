<?php

namespace App\Orchid\Handlers;

use App\Models\Category;
use Illuminate\Http\Request;

trait CategoryHandler
{

    public function handleSave ( Request $request )
    {
        $request->validate( [
            "name" => "required",
        ] );
        Category::create( [ "name" => $request->name ] );
        alert( "Успешно сохранено" );
    }

    public function handleRemove ( int $id )
    {
        Category::destroy( [ $id ] );
        alert( "Успешно удалено" );
    }

    public function handleUpdate ( Request $request, int $id )
    {
        $request->validate( [
            "name" => "required",
        ] );
        Category::query()->find( $id )->update( [ "name" => $request->name ] );
        alert( "Успешно обновлено" );
    }

}
