<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'company', 'email', 'phone', 'subject', 'message', 'status', 'ip_address'];
}
