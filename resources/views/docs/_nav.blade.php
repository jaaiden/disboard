<aside class="menu">

    <p class="menu-label">Docs</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('docs.home') }}" class="{{ Request::is('docs') ? 'has-text-info' : '' }}">
                <i class="fad fa-terminal fa-lg fa-fw"></i>
                &nbsp;&nbsp;Home
            </a>
        </li>
    </ul>

    <p class="menu-label">Models</p>
    <ul class="menu-list">
        <li>
            <a href="{{ url('docs/models/channel') }}" class="{{ Request::is('docs/models/channel') ? 'has-text-info' : '' }}">
                <i class="fad fa-hashtag fa-lg fa-fw"></i>
                &nbsp;&nbsp;Channel
            </a>
        </li>

        <li>
            <a href="{{ url('docs/models/guild') }}" class="{{ Request::is('docs/models/guild') ? 'has-text-info' : '' }}">
                <i class="fad fa-server fa-lg fa-fw"></i>
                &nbsp;&nbsp;Guild
            </a>
        </li>

        <li>
            <a href="{{ url('docs/models/role') }}" class="{{ Request::is('docs/models/role') ? 'has-text-info' : '' }}">
                <i class="fad fa-tag fa-lg fa-fw"></i>
                &nbsp;&nbsp;Role
            </a>
        </li>

        <li>
            <a href="{{ url('docs/models/user') }}" class="{{ Request::is('docs/models/user') ? 'has-text-info' : '' }}">
                <i class="fad fa-user fa-lg fa-fw"></i>
                &nbsp;&nbsp;User
            </a>
        </li>
    </ul>

</aside>