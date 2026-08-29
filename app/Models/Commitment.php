<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Commitment extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description', 'icon', 'order_column'];

    public $translatable = ['title', 'description'];
}
