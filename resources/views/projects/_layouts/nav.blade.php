@php use App\Models\Project; @endphp
<aside class="menu">

    <ul class="menu-list">

        <li>
            <a href="{{ route('projects.home') }}" class="{{ Request::is('projects') ? 'has-text-info' : '' }}">
                <i class="fad fa-home fa-lg fa-fw"></i>
                &nbsp;&nbsp;Home
            </a>
        </li>

        @auth @if (Auth::user()->user_id == '82999419791736832')
        <li>
            <a href="{{ route('projects.add') }}" class="{{ Request::is('projects/add') ? 'has-text-info' : '' }}">
                <i class="fad fa-plus-circle fa-lg fa-fw"></i>
                &nbsp;&nbsp;Add New Project
            </a>
        </li>
        @endif @endauth

    </ul>

    <p class="menu-label">Categories</p>
    <ul class="menu-list">

        <li>
            <a href="{{ url('projects/games') }}" class="{{ Request::is('projects/games*') ? 'has-text-info' : '' }}">
                <i class="fad fa-gamepad fa-lg fa-fw"></i>
                &nbsp;&nbsp;Games
                <span class="has-text-right is-pulled-right">{{ number_format(Project::categoryCount('games')) }}</span>
            </a>
        </li>

        <li>
            <a href="{{ url('projects/music') }}" class="{{ Request::is('projects/music*') ? 'has-text-info' : '' }}">
                <i class="fad fa-music-alt fa-lg fa-fw"></i>
                &nbsp;&nbsp;Music
                <span class="has-text-right is-pulled-right">{{ number_format(Project::categoryCount('music')) }}</span>
            </a>
        </li>

        <li>
            <a href="{{ url('projects/server-management') }}" class="{{ Request::is('projects/server-management*') ? 'has-text-info' : '' }}">
                <i class="fad fa-server fa-lg fa-fw"></i>
                &nbsp;&nbsp;Server Management
                <span class="has-text-right is-pulled-right">{{ number_format(Project::categoryCount('server-management')) }}</span>
            </a>
        </li>
    </ul>

</aside>