<?php

$dir = __DIR__ . '/database/migrations/';
$files = scandir($dir);

function updateMigration($files, $dir, $tableName, $content) {
    foreach ($files as $file) {
        if (strpos($file, 'create_' . $tableName . '_table.php') !== false) {
            file_put_contents($dir . $file, $content);
            echo "Updated {$file}\n";
            return;
        }
    }
    echo "Could not find migration for {$tableName}\n";
}

updateMigration($files, $dir, 'pages', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->json('title');
            $table->json('slug')->nullable();
            $table->json('content')->nullable();
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pages'); }
};
PHP
);

updateMigration($files, $dir, 'services', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug');
            $table->json('overview')->nullable();
            $table->json('solutions')->nullable();
            $table->json('project_types')->nullable();
            $table->json('process')->nullable();
            $table->json('considerations')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_column')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('services'); }
};
PHP
);

updateMigration($files, $dir, 'sectors', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug');
            $table->json('description')->nullable();
            $table->json('constraints')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_column')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sectors'); }
};
PHP
);

updateMigration($files, $dir, 'projects', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->nullable()->constrained()->nullOnDelete();
            $table->json('title');
            $table->json('slug');
            $table->json('location')->nullable();
            $table->json('scope')->nullable();
            $table->json('materials')->nullable();
            $table->json('surface_areas')->nullable();
            $table->json('constraints')->nullable();
            $table->json('solution')->nullable();
            $table->json('results')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('projects'); }
};
PHP
);

updateMigration($files, $dir, 'partners', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('partners'); }
};
PHP
);

updateMigration($files, $dir, 'statistics', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('type'); 
            $table->string('year')->nullable();
            $table->string('value');
            $table->json('label');
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('statistics'); }
};
PHP
);

updateMigration($files, $dir, 'commitments', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('commitments', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('commitments'); }
};
PHP
);

updateMigration($files, $dir, 'contact_requests', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('new');
            $table->ipAddress('ip_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('contact_requests'); }
};
PHP
);

updateMigration($files, $dir, 'quote_requests', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone');
            $table->string('project_location');
            $table->string('project_type');
            $table->string('approximate_surface_area')->nullable();
            $table->string('expected_start_date')->nullable();
            $table->text('project_description');
            $table->string('status')->default('New'); 
            $table->ipAddress('ip_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('quote_requests'); }
};
PHP
);

updateMigration($files, $dir, 'quote_attachments', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('quote_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->constrained()->cascadeOnDelete();
            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('quote_attachments'); }
};
PHP
);

updateMigration($files, $dir, 'settings', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('settings'); }
};
PHP
);

updateMigration($files, $dir, 'project_service', <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('project_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
        });
    }
    public function down(): void { Schema::dropIfExists('project_service'); }
};
PHP
);

echo "All migrations updated successfully.\n";
