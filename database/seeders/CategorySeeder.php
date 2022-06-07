<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    private array $data = [
        [ 'name' => 'Печенье' ],
        [ 'name' => 'Шоколад' ],
        [ 'name' => 'Карамель' ],
        [ 'name' => 'Вафли' ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        Category::query()->insert( $this->data );
    }

}
