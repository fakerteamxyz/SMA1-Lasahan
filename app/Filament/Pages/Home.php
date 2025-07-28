<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Home extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.home';

    public static function getRoutes(): array
    {
        return [
            '/' => static::getRouteName(),
        ];
    }

    public static function getRouteName(?string $panel = null): string
    {
        return 'filament.admin.home';
    }
}
