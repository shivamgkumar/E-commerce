<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscribedUser extends Model
{
    protected $table='subscribed_users';
    protected $fillable=['email'];
}
