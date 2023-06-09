<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password'
    ];

    protected static function newFactory()
    {
        return \Modules\Auth\Database\factories\UserFactory::new();
    }
}
