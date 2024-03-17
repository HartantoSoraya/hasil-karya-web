<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebConfiguration extends Model
{
    use HasFactory, SoftDeletes, UUID;

    protected $fillable = [
        'title',
        'description',
        'logo',
    ];
}
