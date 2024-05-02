<?php

namespace Workbench\App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GenerateFontEnumCommand extends Command
{
    protected $signature = 'meta:generate-font-enum';

    protected $description = 'Generate a Font enum for all fonts supported by Bunny.';

    public function handle()
    {
        $this->info('Loading fonts from Bunny...');

        $response = Http::get('https://fonts.bunny.net/list')->json();
        $template = <<<'PHP'
        <?php

        namespace RyanChandler\BunnyFonts;

        enum FontFamily: string
        {
        %s
        }
        PHP;

        $fonts = [];

        foreach ($response as $font => $options) {
            $fonts[] = sprintf('    // https://fonts.bunny.net/family/%s', $font);
            $fonts[] = sprintf("    case %s = '%s';", str($options['familyName'])->studly(), $font);
        }

        file_put_contents(__DIR__.'/../../../src/FontFamily.php', sprintf($template, implode("\n", $fonts)));

        $this->info('Font enum generated!');
    }
}
