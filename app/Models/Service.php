<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;

class Service extends Model
{
    use HasFactory, UUID, SoftDeletes;

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'slug',
    ];
}
