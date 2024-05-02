<?php

namespace RyanChandler\BunnyFonts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \RyanChandler\BunnyFonts\FontSet default()
 * @method static \RyanChandler\BunnyFonts\FontSet add(\RyanChandler\BunnyFonts\FontFamily $font, array $weights = [400])
 * @method static \RyanChandler\BunnyFonts\FontSet set(string $name)
 * @method static \RyanChandler\BunnyFonts\FontSet|null getSet(string $name = 'default')
 *
 * @see \RyanChandler\BunnyFonts\BunnyFonts
 */
class BunnyFonts extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \RyanChandler\BunnyFonts\BunnyFontsManager::class;
    }
}
