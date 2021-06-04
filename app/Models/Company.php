<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'uuid',
        'name',
        'url',
        'phone',
        'whatsapp',
        'email',
        'facebook',
        'instagram',
        'youtube',
    ];
}
