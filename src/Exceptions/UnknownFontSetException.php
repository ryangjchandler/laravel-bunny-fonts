<?php

namespace RyanChandler\BunnyFonts\Exceptions;

use Exception;

final class UnknownFontSetException extends Exception
{
    public static function make(string $set): self
    {
        return new self("The font set [{$set}] does not exist.");
    }
}
