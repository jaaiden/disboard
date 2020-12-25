<?php

namespace App\Models;

use App\Models\Guild;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Requests;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'discriminator', 'avatar',
        'discord_token', 'discord_private_channel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'discord_token', 'remember_token', 'discord_private_channel',
        'api_token'
    ];

    public function routeNotificationForDiscord()
    {
        return $this->discord_private_channel;
    }

    public function getDisplayName()
    {
        return "{$this->username}#{$this->discriminator}";
    }

    public function getGuildsAttribute()
    {
        if (!Cache::has("user.$this->user_id.guilds"))
        {
            $guilds = Requests::get(
                env('DISCORD_API_URL') . '/users/@me/guilds',
                [
                    'Content-Type'  => 'application/json',
                    'Authorization' => "Bearer $this->discord_token"
                ],
                []
            )->body;
            Cache::put("user.$this->user_id.guilds", json_decode($guilds, true), 120);
        }
        return Guild::hydrate(Cache::get("user.$this->user_id.guilds"));
    }

}
