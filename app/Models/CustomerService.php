<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CustomerService extends Model
{
    use HasFactory, Notifiable, SoftDeletes, UUID;

    protected $fillable = [
        'title',
        'email',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
