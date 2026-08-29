<?php

$dir = __DIR__ . '/app/Filament/Resources/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Replace text inputs for long text fields with RichEditor or Textarea
    $content = preg_replace("/Forms\\\Components\\\TextInput::make\('(content|overview|solutions|project_types|process|considerations|description|constraints|scope|materials|surface_areas|solution|results)'\)/", "Forms\Components\RichEditor::make('$1')", $content);

    // Replace text inputs for images with FileUpload
    $content = preg_replace("/Forms\\\Components\\\TextInput::make\('(image|main_image|logo_path|icon)'\)/", "Forms\Components\FileUpload::make('$1')->image()->directory('$1s')", $content);

    // Make slug optional/auto-generated or just remove required if we want to
    // Just keeping it simple for now

    file_put_contents($file, $content);
}

echo "Filament forms updated.\n";
