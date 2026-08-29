<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the XML sitemap for the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                // Ignore admin routes
                if (str_contains($url->url, '/admin') || str_contains($url->url, '/livewire')) {
                    return null;
                }
                
                // Add localization variants (we're crawling the default locale and letting it handle the others)
                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');
    }
}
