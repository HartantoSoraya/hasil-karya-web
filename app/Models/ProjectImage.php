<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectImage extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'project_id',
        'image',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
