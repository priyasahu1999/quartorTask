<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingProject extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'name',
        'email',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];
}
