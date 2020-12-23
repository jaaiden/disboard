<?php

namespace App\Models;

use App\Models\Channel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Model\Model;
use Requests;

class Guild extends Model
{

    public static function fromId($guildid = null)
    {
        if (is_null($guildid)) return;
        if (!Cache::has("guild.$guildid"))
        {
            $guild = Requests::get(
                env('DISCORD_API_URL') . "/guilds/$guildid",
                [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bot ' . env('DISCORD_TOKEN')
                ],
                []
            )->body;
            Cache::put("guild.$guildid", json_decode($guild, true), 300);
        }
        return Guild::hydrate(Cache::get("guild.$guildid"));
    }

    public function getChannelsAttribute()
    {
        if (!Cache::has("guild.$this->id.channels"))
        {
            $channels = Requests::get(
                env('DISCORD_API_URL') . "/guilds/$this->id/channels",
                [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bot ' . env('DISCORD_TOKEN')
                ],
                []
            )->body;
            Cache::put("guild.$this->id.channels", json_decode($channels, true), 300);
        }
        return Channel::hydrate(Cache::get("guild.$this->id.channels"));
    }

    public function getRolesAttribute()
    {
        if (!Cache::has("guild.$this->id.roles"))
        {
            $roles = Requests::get(
                env('DISCORD_API_URL') . "/guilds/$this->id/roles",
                [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bot ' . env('DISCORD_TOKEN')
                ],
                []
            )->body;
            Cache::put("guild.$this->id.roles", json_decode($roles, true), 300);
        }
        return Role::hydrate(Cache::get("guild.$this->id.roles"));
    }

    public function getImageAttribute()
    {
        return "https://cdn.discordapp.com/icons/$this->id/$this->icon.png";
    }
}
