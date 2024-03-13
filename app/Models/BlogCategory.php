<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_category_pivot');
    }
}
