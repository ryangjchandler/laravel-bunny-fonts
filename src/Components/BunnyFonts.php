<?php

namespace RyanChandler\BunnyFonts\Components;

use Illuminate\View\Component;
use RyanChandler\BunnyFonts\Facades;
use RyanChandler\BunnyFonts\FontSet;

class BunnyFonts extends Component
{
    public FontSet $set;

    public function __construct(string $set = 'default')
    {
        $this->set = Facades\BunnyFonts::getSet($set);
    }

    public function render()
    {
        return $this->set->toHtml();
    }
}
