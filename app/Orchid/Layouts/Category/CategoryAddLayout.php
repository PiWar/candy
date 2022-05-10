<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class CategoryAddLayout extends Rows
{

    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title = "Add new category";

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields (): iterable
    {
        return [
            Input::make( "name" )
                ->title( "Name" ),
            Button::make( "Сохранить" )
                ->type( Color::SUCCESS() )
                ->method( "handleSave" ),
        ];
    }

}
