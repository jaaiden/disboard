<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [ 'username', 'userid', 'discrim', 'avatar', 'access_token' ];
    protected $hidden = [ 'access_token', 'remember_token' ];
    
    public function getDisplayName() { return "{$this->username}#{$this->discrim}"; }
}
