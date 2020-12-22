<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use NotificationChannels\Discord\Discord;
use Socialite;

class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except('handleLogout');
    }

    public function redirectToDiscord()
    {
        return Socialite::driver('discord')
            ->setScopes([ 'identify', 'guilds' ])
            ->redirect();
    }

    public function handleDiscordCallback()
    {
        if ($discordUser = Socialite::driver('discord')->user())
        {
            if ($user = User::updateOrCreate(
                [ 'user_id' => $discordUser->getId() ],
                [
                    'username'                  => $discordUser->getName(),
                    'discriminator'             => $discordUser['discriminator'],
                    'avatar'                    => $this->getAvatar($discordUser->avatar) ?? null,
                    'discord_token'             => $discordUser->token,
                    'discord_private_channel'   => app(Discord::class)->getPrivateChannel($discordUser->getId())
                ]
            ))
            {
                Auth::loginUsingId($user->id);
            }
        }

        return redirect('/');
    }

    public function handleLogout()
    {
        Auth::user()->discord_token = "";
        Auth::user()->discord_private_channel = "";
        Auth::user()->save();
        Auth::logout();
        return redirect('/');
    }

    private function getAvatar($avatar)
    {
        if (Str::startsWith(collect(explode('/', $avatar))->last(), 'a_'))
        {
            return substr_replace($avatar, 'gif', -3);
        }
        return $avatar;
    }

}
