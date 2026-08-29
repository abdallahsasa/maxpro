<?php
require __DIR__ . "/vendor/autoload.php";
use Illuminate\Support\Str;

$resources = [
    'Page', 'Service', 'Sector', 'Project', 'Statistic', 'Commitment', 'Setting'
];

$basePath = __DIR__ . '/app/Filament/Resources/';

foreach ($resources as $res) {
    // 1. Update Resource
    $resourcePath = $basePath . $res . 'Resource.php';
    if (file_exists($resourcePath)) {
        $content = file_get_contents($resourcePath);
        if (strpos($content, 'use Translatable;') === false) {
            $content = str_replace(
                "use Filament\Resources\Resource;",
                "use Filament\Resources\Resource;\nuse Filament\Resources\Concerns\Translatable;",
                $content
            );
            $content = preg_replace(
                '/class ' . $res . 'Resource extends Resource\n\{/',
                "class {$res}Resource extends Resource\n{\n    use Translatable;\n",
                $content
            );
            file_put_contents($resourcePath, $content);
            echo "Updated {$res}Resource.php\n";
        }
    }

    // 2. Update Pages
    $pagesPath = $basePath . $res . 'Resource/Pages/';
    
    // Create
    $createPath = $pagesPath . 'Create' . $res . '.php';
    if (file_exists($createPath)) {
        $content = file_get_contents($createPath);
        if (strpos($content, 'use CreateRecord\Concerns\Translatable;') === false) {
            $content = preg_replace(
                '/class Create' . $res . ' extends CreateRecord\n\{/',
                "class Create{$res} extends CreateRecord\n{\n    use CreateRecord\Concerns\Translatable;\n",
                $content
            );
            file_put_contents($createPath, $content);
        }
    }

    // Edit
    $editPath = $pagesPath . 'Edit' . $res . '.php';
    if (file_exists($editPath)) {
        $content = file_get_contents($editPath);
        if (strpos($content, 'use EditRecord\Concerns\Translatable;') === false) {
            $content = preg_replace(
                '/class Edit' . $res . ' extends EditRecord\n\{/',
                "class Edit{$res} extends EditRecord\n{\n    use EditRecord\Concerns\Translatable;\n",
                $content
            );
            file_put_contents($editPath, $content);
        }
    }

    // List
    $listPath = $pagesPath . 'List' . Str::plural($res) . '.php';
    if (!file_exists($listPath)) {
        $listPath = $pagesPath . 'List' . $res . 's.php';
    }
    if ($res === 'Statistic') {
        $listPath = $pagesPath . 'ListStatistics.php';
    }
    if (file_exists($listPath)) {
        $content = file_get_contents($listPath);
        if (strpos($content, 'use ListRecords\Concerns\Translatable;') === false) {
            $content = preg_replace(
                '/class List.* extends ListRecords\n\{/',
                "$0\n    use ListRecords\Concerns\Translatable;\n",
                $content
            );
            file_put_contents($listPath, $content);
        }
    }
}

echo "All Filament resources updated for translations.\n";
