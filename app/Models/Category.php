<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\Portfolio;


class Category extends Model
{
    protected $fillable = [
        'name',
        'created_by'
        // add all other fields
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}
