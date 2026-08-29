<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Sector extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'description', 'constraints', 'image', 'order_column', 'is_published'];

    public $translatable = ['title', 'slug', 'description', 'constraints'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
