<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class OrderProduct extends Model
{

    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        "product_id",
        "order_id",
        "count",
    ];

    public function product ()
    {
        return $this->belongsTo( Product::class );
    }

    public function order ()
    {
        return $this->belongsTo(Order::class);
    }

}
