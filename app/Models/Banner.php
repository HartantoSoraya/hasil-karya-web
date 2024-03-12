<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'url',
        'text_url',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
