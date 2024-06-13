<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    // protected $connection = 'second_db';
    protected $fillable = [
        'user_name',
        'user_email',
        'user_tel',
        'user_addr1',
        'user_addr2',
        'user_city',
        'user_state',
        'user_zip_code',
        'user_username',
        'user_password'
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
