<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class CategoryListLayout extends Table
{

    protected $title = "List categories";
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns (): iterable
    {
        return [
            TD::make( "id", "ID" )
                ->sort()
                ->filter( Input::make()->type( "number" ) )
                ->width( "120px" ),
            TD::make( "name", "Name" )
                ->sort()
                ->filter( Input::make() ),
            TD::make( "action", "Action" )
                ->width( "100px" )
                ->alignRight()
                ->render( function ( Category $category ) {
                    return
                        DropDown::make()
                            ->icon( "options-vertical" )
                            ->list( [
                                Button::make( "delete" )
                                    ->icon( "trash" )
                                    ->confirm( "confirm" )
                                    ->method( "handleRemove", [ $category->id ] ),
                                ModalToggle::make( "edit" )
                                    ->icon( "pencil" )
                                    ->modal( "change" )
                                    ->method( "handleUpdate", [ $category->id ] ),
                            ] );

                } ),
        ];
    }

}
