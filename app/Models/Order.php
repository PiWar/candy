<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Order extends Model
{

    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        "user_name",
        "user_phone",
        "user_email",
        "total_price",
        "slug",
        "status",
    ];

    public function orderProducts ()
    {
        return $this->hasMany( OrderProduct::class );
    }

    protected $allowedSorts = [
        "id",
        "total_price",
        "status",
    ];
    protected $allowedFilters = [
        "user_name",
        "user_phone",
        "user_email",
        "slug",
        "status",
    ];

}
