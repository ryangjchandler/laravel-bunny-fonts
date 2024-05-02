<?php

namespace RyanChandler\BunnyFonts;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BunnyFontsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('bunny-fonts');
    }

    public function packageBooted()
    {
        Blade::component('bunny-fonts', Components\BunnyFonts::class);
        Blade::directive('bunnyFonts', function (string $expression) {
            return "<?php echo \RyanChandler\BunnyFonts\Facades\BunnyFonts::getSet({$expression})->toHtml(); ?>";
        });
    }
}
