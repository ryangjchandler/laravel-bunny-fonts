<?php

namespace RyanChandler\BunnyFonts;

class Font
{
    public function __construct(
        public FontFamily $font,
        public array $weights = [400],
    ) {}

    public function toBunnyString(): string
    {
        return str($this->font->value)->lower()->replace(' ', '-')->append(':')->append(implode(',', $this->weights));
    }
}
