<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;


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
}
