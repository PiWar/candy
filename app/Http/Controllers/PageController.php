<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\RepositoryTrait\ProductRepositoryTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{

    use ProductRepositoryTrait;


    /**
     * @param  string|null  $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index ( string|null $category = null )
    {
        $uri = (string)$category ?? "";
        $categories = Category::all();
        $products = $this->getByCategory( $category );
        return view( "welcome", compact(
            'categories',
            'uri',
            'products',
        ) );
    }

    public function card ()
    {
        return view( "card" );
    }

    public function orders ()
    {
        $user = session()->get( "_user" );
        $orders = Order::query()
            ->where( "user_name", "=", $user[ "name" ] )
            ->where( "user_phone", "=", $user[ "phone" ] )
            ->get();
        return view( "orders", compact("orders", 'user') );
    }

    public function loginOrders ()
    {
        return view( "loginOrders" );
    }

}
