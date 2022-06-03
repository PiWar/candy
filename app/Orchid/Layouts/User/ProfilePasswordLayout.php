<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class ProfilePasswordLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Password::make('old_password')
                ->placeholder(__('Введите текущий пароль'))
                ->title(__('Текуший пароль'))
                ->help('Пароль установленный в текущий момент.'),

            Password::make('password')
                ->placeholder(__('Введите новый пароль'))
                ->title(__('Новый пароль')),

            Password::make('password_confirmation')
                ->placeholder(__('Введите новый пароль'))
                ->title(__('Подтверждение пароля'))
                ->help('Хороший пароль должен содержать от 8 символов, содержать в себе цифры и буквы'),
        ];
    }
}
