@extends ('docs._base')
@section ('docs.title', 'Role (Model)')
@section ('docs.hero.title', 'Role')
@section ('docs.hero.subtitle', 'An object representing a Discord Role')

@section ('docs.content')

    <section class="section" id="description">
        <h1 class="title is-4">
            <a href="#description">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Description
        </h1>

        <p>The role model represents an instance of a role that can be assigned to a user and/or bot. Roles grant permissions within servers and channels on a given Discord <a href="{{ url('docs/models/guild') }}">guild</a>.</p>
    </section>

    <section class="section" id="attributes">
        <h1 class="title is-4">
            <a href="#attributes">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Attributes
        </h1>

        <p>A role model will have the following attributes set when successfully returned. You can access these directly using the <code>-></code> operator.</p>

        <br>

        <p><kbd>id</kbd> - The role's Discord (<a href="https://discord.com/developers/docs/reference#snowflakes" target="_blank">snowflake</a>) ID.</p>
        <p><kbd>name</kbd> - The role's name.</p>
        <p><kbd>color</kbd> - The role's color.</p>
        <p><kbd>hoisted</kbd> - Whether or not the role is hoisted (shown independently in the member list).</p>
    </section>

    <section class="section" id="collections">
        <h1 class="title is-4">
            <a href="#collections">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Collections
        </h1>

        <br>

        <div class="notification">
            <h2 class="subtitle is-6"><strong>channels</strong></h2>
            <p>Returns a collection of <a href="{{ url('docs/models/channel') }}">channels</a> that the guild has.</p>
            <br>
            <pre><code class="php">
//...
@verbatim
@foreach ($guild->channels as $channel)
    {{ $channel->name }}
@endforeach
@endverbatim
            </code></pre>
        </div>

        <div class="notification">
            <h2 class="subtitle is-6"><strong>roles</strong></h2>
            <p>Returns a collection of <a href="{{ url('docs/models/role') }}">roles</a> that the guild has.</p>
            <br>
            <pre><code class="php">
//...
@verbatim
@foreach ($guild->roles as $role)
    {{ $role->name }}
@endforeach
@endverbatim
            </code></pre>
        </div>

    </section>





    

@endsection