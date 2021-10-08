<?php

namespace Hillel\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    protected $fillable = [
        'title',
        'slug',
    ];

}
