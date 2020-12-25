<nav class="navbar is-transparent">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('app.home') }}">{{ config('app.name') }}</a>

            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu" id="navMenu">
            
            <div class="navbar-start">

                <a class="navbar-item" href="{{ route('app.home') }}">
                    <span class="icon">
                        <i class="fad fa-home fa-fw"></i>
                    </span>
                    <span>&nbsp;&nbsp;Home</span>
                </a>

                <a class="navbar-item" href="{{ route('docs.home') }}">
                    <span class="icon">
                        <i class="fad fa-terminal fa-fw"></i>
                    </span>
                    <span>&nbsp;&nbsp;Docs</span>
                </a>

                <a class="navbar-item" href="https://github.com/zackdevine/disboard" target="_blank">
                    <span class="icon">
                        <i class="fab fa-github fa-fw"></i>
                    </span>
                    <span>&nbsp;&nbsp;GitHub</span>
                </a>

            </div>
            
            <div class="navbar-end">

                @auth
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <img src="{{ Auth::user()->avatar }}" style="border-radius: 4px; height: 32px;">
                            &nbsp;&nbsp;{{ Auth::user()->getDisplayName() }}
                        </a>

                        <div class="navbar-dropdown is-right">

                            <a class="navbar-item" href="{{ route('app.user') }}">
                                <span class="icon">
                                    <i class="fad fa-user fa-fw"></i>
                                </span>
                                <span>Profile</span>
                            </a>

                            <a class="navbar-item" href="{{ route('auth.logout') }}">
                                <span class="icon">
                                    <i class="fad fa-sign-out-alt fa-fw"></i>
                                </span>
                                <span>Sign out</span>
                            </a>

                        </div>
                    </div>
                @endauth
                @guest
                    <a class="navbar-item" href="{{ route('auth.login') }}">
                        <span class="icon"><i class="fab fa-discord"></i></span>
                        <span>Login with Discord</span>
                    </a>
                @endguest
            </div>

        </div>
    </div>
</nav>