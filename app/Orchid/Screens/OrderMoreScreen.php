<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\Product;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Legend;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;

class OrderMoreScreen extends Screen
{

    private Order $order;

    public function getProducts ()
    {
        $result = "<div style='display: flex; flex-wrap: wrap; gap: 10px'>";
//        alert( $this->order->orderProducts()->first()->product );
        foreach ( $this->order->orderProducts as $orderProduct ) {
            $product = $orderProduct->product;
            $result .= $this->getProduct( $product, $orderProduct->count );
        }
        $result .= "</div>";
        return $result;
    }

    public function getProduct ( Product $product, int $count )
    {
        return "<div style='display: flex; align-items: center; gap: 10px'>
            <span><img src='$product->image' style='width: 60px; border-radius: 50%; aspect-ratio: 1/1; object-fit: contain'></span>
            <span><b>Название:</b> $product->title</span>
            <span><b>Количество:</b> $count</span>
        </div>";
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query ( Order $order ): iterable
    {
        $this->order = $order;
        return [
            "order" => $order,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name (): ?string
    {
        return 'Заказ';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar (): iterable
    {
        return [
            Link::make('Назад')
            ->route('platform.order')
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
            Layout::legend( "order", [
                Sight::make( "user_name", "Имя заказчика" ),
                Sight::make( "user_phone", "Телефон заказчика" ),
                Sight::make( "user_email", "Почта заказчика" ),
                Sight::make( "total_price", "Итоговая стоимость" )
                    ->render( fn( Order $order ) => "$order->total_price p." ),
                Sight::make( "slug", "Номер заказа" ),
                Sight::make( "Товары", "Products" )
                    ->render( fn( Order $order ) => $this->getProducts() ),
            ] ),
        ];
    }

}
