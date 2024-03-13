<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'slug',
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_pivot');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag_pivot');
    }
}
