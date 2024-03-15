<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'title',
        'subtitle',
    ];

    public function getThumbnailUrlAttribute()
    {
        return asset('storage/'.$this->thumbnail);
    }
}
