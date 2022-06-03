<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Category;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class ProductMainInfoLayout extends Rows
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
            Input::make( "product.title" )
                ->type( "text" )
                ->max( 255 )
                ->title( "Название" )
                ->placeholder( "название" ),
            Select::make( "product.category_id" )
                ->fromModel( Category::class, "name" )
                ->value($this?->product?->category_id ?? null)
                ->title( "Категория" ),
        ];
    }

}
