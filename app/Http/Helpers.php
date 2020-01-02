<?php

if (!function_exists('discordAPI'))
{
    // Helper function for accessing Discord's API
    function discordAPI ($url, $method = 'get', $asUser = false, $user = null, $opts = array())
    {
        if (!$asUser && env('DISCORD_TOKEN') == '') return;
        if ($asUser && $user == null) return;

        $discord_api_url = "https://discordapp.com/api";
        $token = '';
        
        if ($asUser) $token = "Bearer " . $user->access_token;
        else $token = 'Bot ' . env('DISCORD_TOKEN');

        $headers = [
            'Accept'        => 'application/json',
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
}

////////////////////////////////////////
// Discord API helper functions       //
////////////////////////////////////////


////////////////////////////////////////
// Guild-specific functions           //
////////////////////////////////////////

if (!function_exists('dapi_getGuild'))
{
    // Returns a JSON object with guild data
    // Guild object: https://discordapp.com/developers/docs/resources/guild#guild-object
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    function dapi_getGuild($guildId)
    {
        return discordAPI("guilds/$guildId");
    }
}

if (!function_exists('dapi_getGuildChannels'))
{
    // Returns a JSON object with a list of guild channel data
    // Guild channel object: https://discordapp.com/developers/docs/resources/channel#channel-object
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    function dapi_getGuildChannels($guildId)
    {
        return discordAPI("guilds/$guildId/channels");
    }
}

if (!function_exists('dapi_getGuildMembers'))
{
    // Returns a JSON object with a list of guild member data
    // Guild channel object: https://discordapp.com/developers/docs/resources/guild#guild-member-object
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    function dapi_getGuildMembers($guildId)
    {
        return discordAPI("guilds/$guildId/members");
    }
}

if (!function_exists('dapi_getGuildMember'))
{
    // Returns a JSON object with a guild member data
    // Guild member object: https://discordapp.com/developers/docs/resources/guild#guild-member-object
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    // $user:       The user object to get info of
    function dapi_getGuildMember($guildId, $user)
    {
        return discordAPI("guilds/$guildId/members/$user->userid");
    }
}

if (!function_exists('dapi_updateGuildMember'))
{
    // Updates a guild member
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    // $user:       The user object to modify
    // $nick:       The new nickname to set on the user (if not blank; requires MANAGE_NICKNAMES)
    // $roles:      A list of roles to assign the user (if not blank; requires MANAGE_ROLES)
    // $mute:       Whether or not to mute the user (requires MUTE_MEMBERS)
    // $deaf:       Whether or not to deafen the user (requires DEAFEN_MEMBERS)
    // $channelId:  Unique ID of a voice channel to move the user to (if not null; user must be in a voice channel; requires CONNECT and MOVE_MEMBERS)
    function dapi_updateGuildMember($guildId, $user, $nick = '', $roles = array(), $mute = false, $deaf = false, $channelId = null)
    {
        $opts = array();
        if ($nick != '') array_push($opts, ['nick' => $nick]);
        if (count($roles) > 0) array_push($opts, $roles);
        if ($mute) array_push($opts, ['mute' => $mute]);
        if ($deaf) array_push($opts, ['deaf' => $deaf]);
        if ($channelId != null) array_push($opts, ['channel_id' => $channelId]);
        return discordAPI("guilds/$guildId/members/$user->userid", 'patch', false, null, $opts);
    }
}

if (!function_exists('dapi_updateGuildNickname'))
{
    // Update's the current user's nickname in the guild
    // Runs as the passed-in user object
    // $guildId:    The unique ID of the guild to access
    // $user:       The user object to update
    // $nick:       The nickname to set
    function dapi_updateGuildNickname($guildId, $user, $nick)
    {
        return discordAPI("guilds/$guildId/members/@me/nick", 'patch', true, $user, ['nick' => $nick]);
    }
}

if (!function_exists('dapi_addGuildMemberRole'))
{
    // Adds a role to a user in the guild
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    // $user:       The user object to update
    // $roleId:     The unique role ID to add
    function dapi_addGuildMemberRole($guildId, $user, $roleId)
    {
        return discordAPI("guilds/$guildId/members/$user->userid/roles/$roleId", 'put');
    }
}

if (!function_exists('dapi_removeGuildMemberRole'))
{
    // Removes a role from a user in the guild
    // Runs as the bot user
    // $guildId:    The unique ID of the guild to access
    // $user:       The user object to update
    // $roleId:     The unique role ID to remove
    function dapi_removeGuildMemberRole($guildId, $user, $roleId)
    {
        return discordAPI("guilds/$guildId/members/$user->userid/roles/$roleId", 'delete');
    }
}