<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Layout;

class ProductPhotoLayout extends Rows
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
            Group::make( [
                Input::make( "product.image" )
                    ->type( "file" )
                    ->horizontal(),
            ] ),
        ];
    }

}
