<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = 'userlist';
    protected $primaryKey = 'id';

    protected $fillable = ['username','email','password', 'access_rights', 'status','picture'];
}
