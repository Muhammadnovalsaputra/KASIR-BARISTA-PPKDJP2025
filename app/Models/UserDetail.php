<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class UserDetail extends Model
{
    //
    protected $fillable = [
        'user_id',
        'company',
        'job',
        'about',
        'phone',
        'photo',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

