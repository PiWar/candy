<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use App\Orchid\Handlers\ProductHandler;
use App\Orchid\Layouts\Product\ProductMainInfoLayout;
use App\Orchid\Layouts\Product\ProductPhotoLayout;
use App\Orchid\Layouts\Product\ProductPropertyLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use PhpParser\Node\Stmt\Label;

class ProductAddScreen extends Screen
{

    use ProductHandler;

    private Product $product;

    /**
     * Query data.
     *
     * @return array
     */
    public function query ( Product $product ): iterable
    {
        $this->product = $product;
        return [
            "product" => $product,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name (): ?string
    {
        return 'ProductAddScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar (): iterable
    {
        return [
            Button::make( "save" )
                ->type( Color::SUCCESS() )
                ->method( !$this?->product?->exists ? "handleSave" : "handleUpdate" ),
            Button::make( "remove" )
                ->type( Color::DANGER() )
                ->method( "handleRemove", [ $this->product->id, true ] )
                ->canSee( $this->product->exists ),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     * @throws \Throwable
     */
    public function layout (): iterable
    {
        return [
            Layout::block( ProductMainInfoLayout::class )
                ->title( "Main info" )
                ->description( "Fill main info about product" ),
            Layout::block( ProductPhotoLayout::class )
                ->title( "Photo" )
                ->description( "Load photo for product" ),
            Layout::block( ProductPropertyLayout::class )
                ->title( "Property" )
                ->description( "Property product" ),
        ];
    }

}
