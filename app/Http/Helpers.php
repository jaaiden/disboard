<?php
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

// Git functions
function getCurrentGitCommit ($short = false)
{
    if ($hash = file_get_contents(base_path('.git/refs/heads/' . env('GIT_BRANCH', 'master'))))
        return $short ? trim(substr($hash, 0, 7)) : trim($hash);
    else return false;
}

function getGitCommitVersion ()
{
    if ($hash = getCurrentGitCommit(true))
    {
        $date = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $date->setTimezone(new \DateTimeZone('UTC'));
        return sprintf('%s (%s UTC)', $hash, $date->format('Y-m-d H:i:s'));
    }
}

// Discord API
function dapi ($url, $method = 'get', $asUser = false, $user = null, $opts = array())
{
    if (!$asUser && env('DISCORD_TOKEN') == '') return;
    if ($asUser && $user == null) return;

    $discord_api_url = "https://discord.com/api/v8";
    $token = '';

    if ($asUser) $token = "Bearer $user->discord_token";
    else $token = 'Bot ' . env('DISCORD_TOKEN');

    $headers = [
        'Content-Type'  => 'application/json',
        'Authorization' => $token
    ];

    switch ($method)
    {
        case 'post': return json_decode(Requests::post("$discord_api_url/$url", $headers, $opts)->body, true);
        case 'patch': return json_decode(Requests::patch("$discord_api_url/$url", $headers, $opts)->body, true);
        case 'delete': return json_decode(Requests::delete("$discord_api_url/$url", $headers, $opts)->body, true);
        case 'get': default: return json_decode(Requests::get("$discord_api_url/$url", $headers, $opts)->body, true);
    }
}

function dapi_getUserAvatar($userid, $discrim = "0001")
{
    if (!Cache::has("user.$userid.avatar"))
    {
        $avatar_hash = dapi("users/$userid")['avatar'];
        $file_url = '';
        if (isset($avatar_hash))
        {
            $cdn_url = "https://cdn.discordapp.com/avatars/$userid";
            if (Str::startsWith($avatar_hash, 'a_'))
            {
                // Avatar is a gif (animated)
                $file_url = "$cdn_url/$avatar_hash.gif?size=2048";
            }
            else
            {
                // Get standard image as png
                $file_url = "$cdn_url/$avatar_hash.png?size=2048";
            }

            Cache::put("user.$userid.avatar", $file_url, 600);
        }
        else
        {
            $default_id = intval($discrim) % 5;
            $file_url = "https://cdn.discordapp.com/embed/avatars/$default_id.png";
            Cache::put("user.$userid.avatar", $file_url, 600);
        }
    }

    return Cache::get("user.$userid.avatar", asset('favicon.png'));
}

function dapi_getUserGuilds(User $user)
{
    if (!Cache::has("user.guilds"))
    {
        Cache::put("user.guilds", collect(dapi("users/@me/guilds", true, $user)), 300);
    }
    return Cache::get("user.guilds");
}

function dapi_getGuild($id)
{
    if (!Cache::has("guild.$id"))
    {
        Cache::put("guild.$id", collect(dapi("guild/$id")), 300);
    }
    return Cache::get("guild.$id");
}