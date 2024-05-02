<?php

use Illuminate\Support\Facades\Blade;
use RyanChandler\BunnyFonts\Facades\BunnyFonts;
use RyanChandler\BunnyFonts\FontFamily;

it('can render the default font set to html using a Blade directive', function () {
    BunnyFonts::add(FontFamily::Inter)
        ->add(FontFamily::FiraCode, [500, 600]);

    expect(Blade::render('<x-bunny-fonts />'))
        ->toBe(<<<'HTML'
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400|fira-code:500,600" rel="stylesheet" />
        HTML);
});

it('can render a custom set to html using a Blade directive', function () {
    BunnyFonts::set('shop')
        ->add(FontFamily::Inter)
        ->add(FontFamily::FiraCode, [200, 300]);

    expect(Blade::render('<x-bunny-fonts set="shop" />'))
        ->toBe(<<<'HTML'
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400|fira-code:200,300" rel="stylesheet" />
        HTML);
});
