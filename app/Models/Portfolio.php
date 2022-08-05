<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'tags',
        'category',
        'is_active',
        'thumbnail',
        // add all other fields
    ];

}
