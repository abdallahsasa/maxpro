<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'overview', 'solutions', 'project_types', 'process', 'considerations', 'image', 'order_column', 'is_published'];

    public $translatable = ['title', 'slug', 'overview', 'solutions', 'project_types', 'process', 'considerations'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
