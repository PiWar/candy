<?php

declare( strict_types = 1 );

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{

    /**
     * @param  Dashboard  $dashboard
     */
    public function boot ( Dashboard $dashboard ): void
    {
        parent::boot( $dashboard );

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu (): array
    {
        return [
            Menu::make( 'Категории' )
                ->icon( 'grid' )
                ->route( 'platform.category' )
                ->title( 'Menu' ),
            Menu::make( "Товары" )
                ->icon("bag")
                ->route( "platform.product" ),
            Menu::make( "Заказы" )
                ->icon("basket-loaded")
                ->route( "platform.order" ),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu (): array
    {
        return [
            Menu::make( 'Профиль' )
                ->route( 'platform.profile' )
                ->icon( 'user' ),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions (): array
    {
        return [
            ItemPermission::group( __( 'System' ) )
                ->addPermission( 'platform.systems.roles', __( 'Roles' ) )
                ->addPermission( 'platform.systems.users', __( 'Users' ) ),
        ];
    }

}
