<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'overview',
        'category',
        'slug',
        'content',
        'tags',
        'thumbnail',
        'active',
        'deleted',
        'user_id',
        'created_by',
        'updated_by',
        // add all other fields
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
