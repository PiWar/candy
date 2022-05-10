<?php

declare( strict_types = 1 );

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Orchid\Handlers\CategoryHandler;
use App\Orchid\Layouts\Category\CategoryAddLayout;
use App\Orchid\Layouts\Category\CategoryListLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class CategoryScreen extends Screen
{
    use CategoryHandler;

    /**
     * Query data.
     *
     * @return array
     */
    public function query (): iterable
    {
        return [
            "categories" => Category::filters()->defaultSort( "id" )->paginate( 10 ),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name (): ?string
    {
        return 'Home page';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description (): ?string
    {
        return 'You are admin page.';
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout (): iterable
    {
        return [
            Layout::modal( "change", [
                Layout::rows( [
                    Input::make( "name" )
                        ->title( "Input new name" )
                        ->placeholder( "..." ),
                ] ),
            ] ),
            Layout::columns( [
                CategoryListLayout::class,
                CategoryAddLayout::class,
            ] ),
        ];
    }
}
