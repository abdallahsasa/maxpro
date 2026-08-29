<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['quote_request_id', 'file_path', 'original_name', 'mime_type', 'size'];

    public function request()
    {
        return $this->belongsTo(QuoteRequest::class, 'quote_request_id');
    }
}
