<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'slug',
        'description',
        'client',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProjectCategory::class, 'project_category_pivot');
    }
}
