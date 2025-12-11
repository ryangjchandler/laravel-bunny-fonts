<?php

namespace RyanChandler\BunnyFonts;

class BunnyFontsManager
{
    protected array $sets = [];

    public function __construct()
    {
        $this->sets['default'] = new FontSet;
    }

    public function default(): FontSet
    {
        return $this->sets['default'];
    }

    public function add(FontFamily $font, array $weights = [400]): FontSet
    {
        return $this->default()->add($font, $weights);
    }

    public function set(string $name): FontSet
    {
        return $this->sets[$name] ??= new FontSet;
    }

    /**
     * @throws Exceptions\UnknownFontSetException
     */
    public function getSet(string $name = 'default'): FontSet
    {
        if (! isset($this->sets[$name])) {
            throw Exceptions\UnknownFontSetException::make($name);
        }

        return $this->sets[$name];
    }
}
