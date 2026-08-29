<?php

// 1. Update app.blade.php for Accessibility (ARIA)
$appLayoutPath = __DIR__ . '/resources/views/components/layouts/app.blade.php';
$appContent = file_get_contents($appLayoutPath);

// Add ARIA labels to the mobile menu button
$appContent = str_replace(
    '<button type="button" class="text-gray-600 hover:text-amber-600 focus:outline-none">',
    '<button type="button" class="text-gray-600 hover:text-amber-600 focus:outline-none" aria-label="Open mobile menu" aria-expanded="false">',
    $appContent
);

// Add ARIA to language switcher
$appContent = str_replace(
    '<button @click="open = !open" @click.away="open = false" class="flex items-center text-gray-600 hover:text-amber-600 uppercase font-medium">',
    '<button @click="open = !open" @click.away="open = false" aria-haspopup="true" :aria-expanded="open" aria-label="Select Language" class="flex items-center text-gray-600 hover:text-amber-600 uppercase font-medium">',
    $appContent
);

file_put_contents($appLayoutPath, $appContent);


// 2. Add x-slot for SEO tags and loading="lazy" to views
$viewsDir = __DIR__ . '/resources/views/';
$viewsToUpdate = [
    'welcome.blade.php' => [
        'title' => 'Premium Floor & Wall Coverings in Paris | MAX PRO SOLS',
        'desc' => 'MAX PRO SOLS is the trusted partner for main contractors, property developers, and architects in Paris and Île-de-France.'
    ],
    'about.blade.php' => [
        'title' => 'About MAX PRO SOLS | Our Mission & Quality Commitments',
        'desc' => 'Discover the story, mission, and commitments that drive MAX PRO SOLS to excellence in the flooring and wall covering industry.'
    ],
    'contact.blade.php' => [
        'title' => 'Contact Us | MAX PRO SOLS',
        'desc' => 'Get in touch with the MAX PRO SOLS team for general inquiries, partnerships, or support in Paris and Île-de-France.'
    ],
    'quote.blade.php' => [
        'title' => 'Request a Quotation | MAX PRO SOLS',
        'desc' => 'Provide details about your project to receive a comprehensive proposal from our construction and flooring experts.'
    ],
    'services/index.blade.php' => [
        'title' => 'Our Services & Floor Covering Solutions | MAX PRO SOLS',
        'desc' => 'Comprehensive floor and wall covering solutions for every professional sector, including industrial resin and acoustic panels.'
    ],
    'projects/index.blade.php' => [
        'title' => 'Our Projects & Case Studies | MAX PRO SOLS',
        'desc' => 'Discover our completed floor and wall covering projects across various sectors in Paris and Île-de-France.'
    ]
];

foreach ($viewsToUpdate as $file => $meta) {
    $path = $viewsDir . $file;
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        // Add slots if not present
        if (strpos($content, '<x-slot:title>') === false) {
            $slots = "\n    <x-slot:title>{$meta['title']}</x-slot:title>\n    <x-slot:description>{$meta['desc']}</x-slot:description>\n";
            $content = preg_replace('/<x-layouts\.app>/', "<x-layouts.app>{$slots}", $content);
        }
        
        // Add lazy loading to images
        $content = str_replace('<img src=', '<img loading="lazy" src=', $content);
        
        file_put_contents($path, $content);
    }
}

// 3. Update dynamic views (services.show, projects.show)
$dynamicViews = [
    'services/show.blade.php' => [
        'title' => '{{ $service->title }} | Services | MAX PRO SOLS',
        'desc' => '{{ Str::limit(strip_tags($service->overview), 150) }}'
    ],
    'projects/show.blade.php' => [
        'title' => '{{ $project->title }} | Projects | MAX PRO SOLS',
        'desc' => '{{ Str::limit(strip_tags($project->scope), 150) }}'
    ]
];

foreach ($dynamicViews as $file => $meta) {
    $path = $viewsDir . $file;
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        if (strpos($content, '<x-slot:title>') === false) {
            $slots = "\n    <x-slot:title>{$meta['title']}</x-slot:title>\n    <x-slot:description>{$meta['desc']}</x-slot:description>\n";
            $content = preg_replace('/<x-layouts\.app>/', "<x-layouts.app>{$slots}", $content);
        }
        $content = str_replace('<img src=', '<img loading="lazy" src=', $content);
        
        file_put_contents($path, $content);
    }
}

echo "Phase 5 SEO and Accessibility updates applied.\n";
