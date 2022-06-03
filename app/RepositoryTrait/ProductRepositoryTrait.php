<?php

namespace App\RepositoryTrait;

use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * repository for product model, type trait
 */
trait ProductRepositoryTrait
{

    /**
     * @return Collection
     */
    private function _getAll (): Collection
    {
        return Product::all();
    }

    /**
     * @param  string  $categoryName
     *
     * @return Collection|array
     */
    private function _getAllByCategoryName ( string $categoryName ): Collection|array
    {
        return Product::query()
            ->where( "count", ">", "0" )
            ->with( "category" )
            ->whereHas( "category", fn( $query ) => $query->where( "name", "=", $categoryName ) )
            ->get();
    }

    /**
     * @param  string|null  $categoryId
     *
     * @return Collection|array
     */
    public function getByCategory ( string|null $categoryId ): Collection|array
    {
        if ( $categoryId ) return $this->_getAllByCategoryName( $categoryId );
        return $this->_getAll();
    }

    /**
     * @param  int  $id
     *
     * @return Builder|array|Collection|Model
     */
    public function getById ( int $id ): Builder|array|Collection|Model
    {
        return Product::query()->find( $id );
    }

}
