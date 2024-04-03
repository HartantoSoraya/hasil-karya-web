<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;
use Illuminate\Notifications\Notifiable;

class CustomerService extends Model
{
    use HasFactory, UUID, SoftDeletes, Notifiable;

    protected $fillable = [
        'title',
        'email',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
