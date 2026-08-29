<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['identifier', 'title', 'slug', 'content', 'seo_title', 'seo_description', 'is_published'];

    public $translatable = ['title', 'slug', 'content', 'seo_title', 'seo_description'];
}
