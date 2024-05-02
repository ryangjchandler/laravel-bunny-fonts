<?php

namespace RyanChandler\BunnyFonts;

use Illuminate\Contracts\Support\Htmlable;

class FontSet implements Htmlable
{
    /**
     * @var array<Font>
     */
    protected array $fonts = [];

    public function add(FontFamily $font, array $weights = [400]): static
    {
        $this->fonts[] = new Font($font, $weights);

        return $this;
    }

    public function getFonts(): array
    {
        return $this->fonts;
    }

    public function toHtml()
    {
        $base = '<link rel="preconnect" href="https://fonts.bunny.net">';
        $families = [];

        foreach ($this->fonts as $font) {
            $families[] = $font->toBunnyString();
        }

        return $base."\n".'<link href="https://fonts.bunny.net/css?family='.implode('|', $families).'" rel="stylesheet" />';
    }
}
