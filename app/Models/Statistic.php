<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['type', 'year', 'value', 'label', 'order_column'];

    public $translatable = ['label'];
}
