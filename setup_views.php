<?php

$viewsDir = __DIR__ . '/resources/views/';
$directories = ['services', 'projects'];

foreach ($directories as $dir) {
    if (!is_dir($viewsDir . $dir)) {
        mkdir($viewsDir . $dir, 0755, true);
    }
}

$views = [
    'services/index.blade.php' => 'Services List',
    'services/show.blade.php' => 'Service Details',
    'projects/index.blade.php' => 'Projects Gallery',
    'projects/show.blade.php' => 'Project Details',
    'contact.blade.php' => 'Contact Us',
    'quote.blade.php' => 'Request a Quote',
    'about.blade.php' => 'About MAX PRO SOLS',
];

$skeleton = <<<'HTML'
<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">{{title}}</h1>
        <p class="text-gray-600">This page is currently under construction.</p>
    </div>
</x-layouts.app>
HTML;

foreach ($views as $path => $title) {
    if (!file_exists($viewsDir . $path)) {
        file_put_contents($viewsDir . $path, str_replace('{{title}}', $title, $skeleton));
    }
}

echo "Skeleton views created.\n";
