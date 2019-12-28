<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [ 'username', 'userid', 'discrim', 'avatar' ];
    protected $hidden = [ 'access_token', 'remember_token' ];
    
    public function isStaff() { return api_IsStaff($this->userid); }
    public function getDisplayName($badge = false, $color = 'primary') { return "{$this->username}#{$this->discrim}"; }
    public function getStaffBadge($color = 'primary')
    {
        if (!$this->isStaff()) return "";
        return "<span class='tag is-$color'>Rythm Staff</span>";
    }
}
