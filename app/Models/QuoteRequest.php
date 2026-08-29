<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuoteRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_name', 'contact_name', 'email', 'phone', 'project_location', 'project_type', 'approximate_surface_area', 'expected_start_date', 'project_description', 'status', 'ip_address'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'quote_request_service');
    }

    public function attachments()
    {
        return $this->hasMany(QuoteAttachment::class);
    }
}
