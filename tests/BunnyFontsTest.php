<?php

use RyanChandler\BunnyFonts\Exceptions\UnknownFontSetException;
use RyanChandler\BunnyFonts\Facades\BunnyFonts;
use RyanChandler\BunnyFonts\FontFamily;

it('can register a font', function () {
    BunnyFonts::add(FontFamily::Inter, [400, 500]);

    expect(BunnyFonts::default()->getFonts())
        ->toHaveLength(1)
        ->sequence(
            fn ($expect) => $expect
                ->font->toBe(FontFamily::Inter)
                ->weights->toBe([400, 500]),
        );
});

it('can create a new font set', function () {
    BunnyFonts::set('shop');

    expect(BunnyFonts::getSet('shop'))->not->toBeNull();
});

it('can register a font to a set', function () {
    BunnyFonts::set('shop')->add(FontFamily::Inter, [400, 500]);

    expect(BunnyFonts::getSet('shop')->getFonts())
        ->toHaveLength(1)
        ->sequence(
            fn ($expect) => $expect
                ->font->toBe(FontFamily::Inter)
                ->weights->toBe([400, 500]),
        );
});

it('throws an UnknownFontSetException when trying to get a set that does not exist', function () {
    BunnyFonts::getSet('unknown');
})->throws(UnknownFontSetException::class);
