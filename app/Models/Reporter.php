<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    /** @use HasFactory<\Database\Factories\ReporterFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'email',
        'phone',
        'age',
        'address',
    ];
}
