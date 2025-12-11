<?php

use RyanChandler\BunnyFonts\FontFamily;
use RyanChandler\BunnyFonts\FontSet;

it('can render a set of html tags for the given fonts', function () {
    $set = new FontSet;
    $set->add(FontFamily::Inter);
    $set->add(FontFamily::FiraCode, [500, 600]);

    expect($set->toHtml())
        ->toBe(<<<'HTML'
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400|fira-code:500,600" rel="stylesheet" />
        HTML);
});
