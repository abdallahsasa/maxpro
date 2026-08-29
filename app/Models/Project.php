<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = ['sector_id', 'title', 'slug', 'location', 'scope', 'materials', 'surface_areas', 'constraints', 'solution', 'results', 'main_image', 'is_featured', 'published_at'];

    public $translatable = ['title', 'slug', 'location', 'scope', 'materials', 'surface_areas', 'constraints', 'solution', 'results'];

    protected $casts = ['published_at' => 'datetime', 'is_featured' => 'boolean'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
