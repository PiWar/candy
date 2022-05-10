<?php

namespace App\Orchid\Handlers;

use App\Models\Order;

trait OrderHandler
{

    public function handleStatus ( int $id, int $status )
    {
        Order::query()->find( $id )->update( [ "status" => $status ] );
    }

    public function handleRemove ( int $id )
    {
        Order::query()->find( $id )->delete();
    }

    public function handleShow ( int $id )
    {
        return redirect()->route("platform.order.more", ["order" => $id]);
    }

}
