<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceImage extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'service_id',
        'image',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/'.$this->image);
    }
}
