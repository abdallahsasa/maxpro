<?php

return [

    'supportedLocales' => [
        'fr' => ['name' => 'French',  'script' => 'Latn', 'native' => 'français', 'regional' => 'fr_FR'],
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English',  'regional' => 'en_GB'],
        'ar' => ['name' => 'Arabic',  'script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE'],
    ],

    'useAcceptLanguageHeader' => false,

    'hideDefaultLocaleInURL' => false,

    'localesOrder' => ['fr', 'en', 'ar'],

    'localesMapping' => [],

    'utf8suffix' => env('LARAVELLOCALIZATION_UTF8SUFFIX', '.UTF-8'),

    'urlsIgnored' => ['/admin', '/admin/*', '/livewire/*', '/_debugbar/*'],

    'httpMethodsIgnored' => ['POST', 'PUT', 'PATCH', 'DELETE'],
];
