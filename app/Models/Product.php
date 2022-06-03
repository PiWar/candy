<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Product extends Model
{

    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        "title",
        "image",
        "category_id",
        "count",
        "price",
        "weight",
    ];

    public function category ()
    {
        return $this->belongsTo( Category::class );
    }

    protected $allowedSorts = [
        "id",
        "title",
        "count",
        "weight",
        "price",
    ];
    protected $allowedFilters = [
        "title",
        "category_id",
    ];

}
