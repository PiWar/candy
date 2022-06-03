<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Orchid\Handlers\OrderHandler;
use App\Orchid\Layouts\Order\OrderListLayout;
use Orchid\Screen\Screen;

class OrderScreen extends Screen
{

    use OrderHandler;

    /**
     * Query data.
     *
     * @return array
     */
    public function query (): iterable
    {
        return [
            "orders" => Order::filters()->defaultSort( "id" )->paginate( 15 ),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name (): ?string
    {
        return 'Заказы';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar (): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout (): iterable
    {
        return [
            OrderListLayout::class,
        ];
    }

}
