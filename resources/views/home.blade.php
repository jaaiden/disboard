<!doctype html>
<html class="has-navbar-fixed-top" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar is-dark is-fixed-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('home') }}"><strong>Disboard</strong></a>
                </div>
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('home') }}">Home</a>
                    <a class="navbar-item" href="https://disboard.dev/docs">Documentation</a>
                    <a class="navbar-item" href="https://github.com/zackdevine/disboard">Github</a>
                </div>
                <div class="navbar-end">
                    @auth
                        <a class="navbar-item" href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">Login with Discord</a>
                    @endguest
                </div>
            </div>
        </nav>

        <section class="hero is-fullheight-with-navbar is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-96x96">
                                @auth
                                <img src="{{ Auth::user()->avatar }}" style="border-radius: 10px;">
                                @endauth
                                @guest
                                <img src="https://discordapp.com/assets/28174a34e77bb5e5310ced9f95cb480b.png" style="border-radius: 10px;">
                                @endguest
                            </p>
                        </figure>
                        <div class="media-content" style="padding-top: 24px;">
                            <h1 class="title is-2">
                                Hello
                                @auth
                                {{ Auth::user()->getDisplayName() }}!
                                @endauth
                                @guest there! @endguest
                            </h1>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </body>
</html>