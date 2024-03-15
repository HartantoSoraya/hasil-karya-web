<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'slug',
    ];

    public function getThumbnailUrlAttribute()
    {
        return asset('storage/'.$this->thumbnail);
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
