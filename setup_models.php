<?php

$dir = __DIR__ . '/app/Models/';

function updateModel($dir, $modelName, $content) {
    file_put_contents($dir . $modelName . '.php', $content);
    echo "Updated {$modelName}\n";
}

updateModel($dir, 'Page', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Page extends Model {
    use HasFactory, HasTranslations;
    protected $fillable = ['identifier', 'title', 'slug', 'content', 'seo_title', 'seo_description', 'is_published'];
    public $translatable = ['title', 'slug', 'content', 'seo_title', 'seo_description'];
}
PHP
);

updateModel($dir, 'Service', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Service extends Model implements HasMedia {
    use HasFactory, HasTranslations, InteractsWithMedia;
    protected $fillable = ['title', 'slug', 'overview', 'solutions', 'project_types', 'process', 'considerations', 'image', 'order_column', 'is_published'];
    public $translatable = ['title', 'slug', 'overview', 'solutions', 'project_types', 'process', 'considerations'];
    public function projects() { return $this->belongsToMany(Project::class); }
}
PHP
);

updateModel($dir, 'Sector', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Sector extends Model implements HasMedia {
    use HasFactory, HasTranslations, InteractsWithMedia;
    protected $fillable = ['title', 'slug', 'description', 'constraints', 'image', 'order_column', 'is_published'];
    public $translatable = ['title', 'slug', 'description', 'constraints'];
    public function projects() { return $this->hasMany(Project::class); }
}
PHP
);

updateModel($dir, 'Project', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Project extends Model implements HasMedia {
    use HasFactory, HasTranslations, InteractsWithMedia;
    protected $fillable = ['sector_id', 'title', 'slug', 'location', 'scope', 'materials', 'surface_areas', 'constraints', 'solution', 'results', 'main_image', 'is_featured', 'published_at'];
    public $translatable = ['title', 'slug', 'location', 'scope', 'materials', 'surface_areas', 'constraints', 'solution', 'results'];
    protected $casts = ['published_at' => 'datetime', 'is_featured' => 'boolean'];
    public function sector() { return $this->belongsTo(Sector::class); }
    public function services() { return $this->belongsToMany(Service::class); }
}
PHP
);

updateModel($dir, 'Partner', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Partner extends Model implements HasMedia {
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['name', 'logo_path', 'url', 'is_active', 'order_column'];
}
PHP
);

updateModel($dir, 'Statistic', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Statistic extends Model {
    use HasFactory, HasTranslations;
    protected $fillable = ['type', 'year', 'value', 'label', 'order_column'];
    public $translatable = ['label'];
}
PHP
);

updateModel($dir, 'Commitment', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Commitment extends Model {
    use HasFactory, HasTranslations;
    protected $fillable = ['title', 'description', 'icon', 'order_column'];
    public $translatable = ['title', 'description'];
}
PHP
);

updateModel($dir, 'ContactRequest', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContactRequest extends Model {
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'company', 'email', 'phone', 'subject', 'message', 'status', 'ip_address'];
}
PHP
);

updateModel($dir, 'QuoteRequest', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QuoteRequest extends Model {
    use HasFactory, SoftDeletes;
    protected $fillable = ['company_name', 'contact_name', 'email', 'phone', 'project_location', 'project_type', 'approximate_surface_area', 'expected_start_date', 'project_description', 'status', 'ip_address'];
    public function services() { return $this->belongsToMany(Service::class, 'quote_request_service'); }
    public function attachments() { return $this->hasMany(QuoteAttachment::class); }
}
PHP
);

updateModel($dir, 'QuoteAttachment', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QuoteAttachment extends Model {
    use HasFactory;
    protected $fillable = ['quote_request_id', 'file_path', 'original_name', 'mime_type', 'size'];
    public function request() { return $this->belongsTo(QuoteRequest::class, 'quote_request_id'); }
}
PHP
);

updateModel($dir, 'Setting', <<<'PHP'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Setting extends Model {
    use HasFactory, HasTranslations;
    protected $fillable = ['key', 'value'];
    public $translatable = ['value'];
}
PHP
);

echo "All models updated successfully.\n";
