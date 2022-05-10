<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductListLayout extends Table
{

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

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
                ->width( "70px" ),
            TD::make( 'image', "Image" )
                ->render( function ( Product $product ) {
                    return "<img
                                src='$product->image'
                                alt='avatar'
                                style='width: 50px; aspect-ratio: 1/1; border-radius: 50%; object-fit: cover' />
                                ";
                } ),
            TD::make( "category_id", "Category" )
                ->render( fn( Product $product ) => $product->category->name )
                ->filter( Select::make()
                    ->fromModel( Category::class, "name", "id" ) ),
            TD::make( "title", "Title" )
                ->sort()
                ->filter( Input::make() ),
            TD::make( "description", "Description" )
                ->filter( Input::make() )
                ->render( fn( Product $product ) => Str::limit( $product->description, 20 ) ),
            TD::make( "count", "Count" )
                ->sort(),
            TD::make( "weight", 'Weight' )
                ->sort(),
            TD::make( "price", "Price" )
                ->sort(),
            TD::make( "action", "Action" )
                ->width( "100px" )
                ->alignRight()
                ->render( function ( Product $product ) {
                    return
                        DropDown::make()
                            ->icon( "options-vertical" )
                            ->list( [
                                Button::make( "delete" )
                                    ->icon( "trash" )
                                    ->confirm( "confirm" )
                                    ->method( "handleRemove", [ $product->id ] ),
                                Button::make( "edit" )
                                    ->icon( "pencil" )
                                    ->method( "handleOpenUpdate", [ $product->id ] ),
                            ] );

                } ),
        ];
    }

}
