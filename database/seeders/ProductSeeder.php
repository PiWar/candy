<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    private array $data = [
        [ "title" => "Печенье колечки со льном", "image" => "/storage/x5GbzSGlFzkyU0HFVJEwFH0cpLNYCYIeZLHDsnV2.webp", "category_id" => "2", "count" => "100", "price" => "550", "weight" => "2 кг" ],
        [ "title" => "Печенье Яшкино \"Рок Фор\"", "image" => "/storage/AkAMvMmFX3D9vgUAmdnbTSjlZIYI9YJc6Fl2ts9t.webp", "category_id" => "2", "count" => "8", "price" => "50", "weight" => "215 г" ],
        [ "title" => "\"Tondi\" choco Pie банановый", "image" => "/storage/inlBA7tdjjqtkB9cYHudzmbP3FxSFPAik1sfwqnp.webp", "category_id" => "2", "count" => "72", "price" => "80", "weight" => "180 г" ],
        [ "title" => "«BabyFox», шоколад детский", "image" => "/storage/t2QLEczK2ed3gm7u68yLYRcQBXJlNCxzRJxUHfsd.webp", "category_id" => "3", "count" => "35", "price" => "85", "weight" => "90 г" ],
        [ "title" => "Шоколад Яшкино с яблоком", "image" => "/storage/T5rwH9ECKYtSOflg64JhjEIjo4ShSvW5EUbUB9KZ.webp", "category_id" => "3", "count" => "119", "price" => "90", "weight" => "90" ],
        [ "title" => "Шоколад Яшкино с арахисом", "image" => "/storage/OuoYhI4xkInWpX1YwfyXkk1O2bckyXX5gvuF4q1T.webp", "category_id" => "3", "count" => "180", "price" => "95", "weight" => "90 г" ],
        [ "title" => "Карамель кислая  Crazy bombs!", "image" => "/storage/7s5Iw7ZX6n2W3R6tgcFmd2b0IAbkwG4FZ7zxfdmU.webp", "category_id" => "4", "count" => "55", "price" => "28", "weight" => "90 г" ],
        [ "title" => "Карамель на палочке Strike", "image" => "/storage/kiUj95vVS9ZerxRiet5II8EHu44oNihmcKrkf48N.webp", "category_id" => "4", "count" => "63", "price" => "44", "weight" => "113 г" ],
        [ "title" => "Вафли мягкие Яшкино", "image" => "/storage/wQiYUBXIbrjMRYlCRae5n9mZ0iPkCuf7dQ9IyCDh.webp", "category_id" => "5", "count" => "44", "price" => "47", "weight" => "120 г" ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        Product::query()->insert( $this->data );
    }

}
