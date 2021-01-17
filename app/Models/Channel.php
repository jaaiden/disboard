<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Jenssegers\Model\Model;
use Requests;

class Channel extends Model
{
    public static function fromId($id)
    {
        if (!Cache::has("channel.$id"))
        {
            $channel = dapi("channels/$id");
            Cache::put("channel.$id", $channel, env('DISCORD_API_CACHE_TIME'));
        }
        return Channel::hydrate(Cache::get("channel.$id"));
    }

    public function isText()
    {
        return $this->type == 0;
    }

    public function isDM()
    {
        return $this->type == 1;
    }

    public function isVoice()
    {
        return $this->type == 2;
    }

    public function isCategory()
    {
        return $this->type == 4;
    }

    public function isNews()
    {
        return $this->type == 5;
    }

    public function isStore()
    {
        return $this->type == 6;
    }

    public function isNSFW()
    {
        return $this->nsfw ?? false;
    }
}
