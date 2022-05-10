<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class ProductPropertyLayout extends Rows
{

    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields (): iterable
    {
        return [
            Input::make( "product.count" )
                ->type( "number" )
                ->title( "Product count" ),
            Input::make( "product.weight" )
                ->type( "text" )
                ->title( "Product weight" )
                ->placeholder( "100 г" ),
            Input::make( "product.price" )
                ->title("Price")
                ->type( "currency" ),
        ];
    }

}
