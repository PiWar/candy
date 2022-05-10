<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use App\Models\Product;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns (): iterable
    {
        return [
            TD::make( "id", "ID" )
                ->width( "70px" )
                ->sort(),
            TD::make( "user_name", "User name" )
                ->filter( Input::make() ),
            TD::make( "user_phone", "User phone" )
                ->filter( Input::make() ),
            TD::make( "user_email", "User email" )
                ->filter( Input::make() ),
            TD::make( "total_price", "Total price" )
                ->sort()
                ->render( fn( Order $order ) => "$order->total_price p." ),
            TD::make( "status", "Status" )
                ->sort()
                ->width( 150 )
                ->alignCenter()
                ->filter( Select::make()
                    ->options( [
                        0 => "Новый заказ",
                        1 => "В обработке",
                        2 => "Выполнен",
                    ] ) )
                ->render( fn( Order $order ) => match ( true ) {
                    $order->status == 0 => "<span style='color: white; border-radius: .5rem; padding: 2px 8px; background: #0052cc; display: block;'>Новый заказ</span>",
                    $order->status == 1 => "<span style='color: white; border-radius: .5rem; padding: 2px 8px; background: #cc9600; display: block;'>В обработке</span>",
                    $order->status == 2 => "<span style='color: white; border-radius: .5rem; padding: 2px 8px; background: #18cc00; display: block;'>Выполнен</span>",
                } ),
            TD::make( "action", "Action" )
                ->width( "100px" )
                ->alignRight()
                ->render( function ( Order $order ) {
                    return
                        DropDown::make()
                            ->icon( "options-vertical" )
                            ->list( [
                                Button::make( "Новый заказ" )
                                    ->method( "handleStatus", [ $order->id, 0 ] ),
                                Button::make( "В обработке" )
                                    ->method( "handleStatus", [ $order->id, 1 ] ),
                                Button::make( "Выполнен" )
                                    ->method( "handleStatus", [ $order->id, 2 ] ),
                                Button::make( "Подробнее" )
                                    ->icon( "list" )
                                ->method("handleShow", [$order->id]),
                                Button::make( "Удалить" )
                                    ->icon( "trash" )
                                    ->method( "handleRemove" [ $order->id ] ),
                            ] );

                } ),
        ];
    }

}
