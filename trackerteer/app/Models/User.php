<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $connection = 'second_db';
    protected $fillable = [
        'name', 'email', 'telephone', 'address_1', 'address_2', 'city', 'state', 'zip_code', 'username', 'password'
    ];
}
