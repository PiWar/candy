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
        return 'Добавление товара';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar (): iterable
    {
        return [
            Button::make( "Сохранить" )
                ->type( Color::SUCCESS() )
                ->method( !$this?->product?->exists ? "handleSave" : "handleUpdate" ),
            Button::make( "Удалить" )
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
                ->title( "Основная информация" )
                ->description( "Заполните основную информацию о товаре." ),
            Layout::block( ProductPhotoLayout::class )
                ->title( "Фотогорафия" )
                ->description( "Загрузите фотографию товара." ),
            Layout::block( ProductPropertyLayout::class )
                ->title( "Характеристика" )
                ->description( "Заполните характеристики товара" ),
        ];
    }

}
