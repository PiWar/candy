<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use App\Orchid\Handlers\ProductHandler;
use App\Orchid\Layouts\Product\ProductListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class ProductScreen extends Screen
{
    use ProductHandler;

    /**
     * Query data.
     *
     * @return array
     */
    public function query (): iterable
    {
        return [
            "products" => Product::filters()->defaultSort( "id" )->paginate( 15 ),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name (): ?string
    {
        return 'Товары';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar (): iterable
    {
        return [
            Link::make( 'Добавить' )
                ->icon( "plus" )
                ->route( "platform.product.add" ),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout (): iterable
    {
        return [
            ProductListLayout::class,
        ];
    }

}
