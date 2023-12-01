<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'published_at'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
