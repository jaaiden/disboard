@extends ('docs._base')
@section ('docs.title', 'User (Model)')
@section ('docs.hero.title', 'User')
@section ('docs.hero.subtitle', 'An object representing a user account')

@section ('docs.content')

    <section class="section" id="description">
        <h1 class="title is-4">
            <a href="#description">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Description
        </h1>

        <p>The user model represents a user that is registered on the site. An instance of a user model contains basic profile information about the user.</p>
    </section>

    <section class="section" id="attributes">
        <h1 class="title is-4">
            <a href="#attributes">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Attributes
        </h1>

        <p>A user model will have the following attributes set when successfully returned. You can access these directly using the <code>-></code> operator.</p>

        <br>

        <p><kbd>id</kbd> - The auto-incrementing identifier for this user's entry in the database.</p>
        <p><kbd>user_id</kbd> - The user's Discord (<a href="https://discord.com/developers/docs/reference#snowflakes" target="_blank">snowflake</a>) User ID.</p>
        <p><kbd>username</kbd> - The user's Discord username.</p>
        <p><kbd>discriminator</kbd> - The user's Discord discriminator (the 4-digit number at the end of their username).</p>
        <p><kbd>avatar</kbd> - The user's Discord avatar. Returns an animated avatar if the user has an animated avatar.</p>
    </section>

    <section class="section" id="functions">
        <h1 class="title is-4">
            <a href="#functions">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Functions
        </h1>

        <br>

        <div class="notification">
            <h2 class="subtitle is-6"><strong>getDisplayName()</strong></h2>
            <p>Returns the user's username and discriminator in the form shown on Discord.</p>
            <br>
            <pre><code class="php">
//...
@verbatim
Hello, {{ Auth::user()->getDisplayName() }}!
// Displays "Hello, username#0000!"
@endverbatim
            </code></pre>
        </div>

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
            <h2 class="subtitle is-6"><strong>guilds</strong></h2>
            <p>Returns a collection of <a href="{{ url('docs/models/guild') }}">guilds</a> that the user belongs to.</p>
            <br>
            <pre><code class="php">
//...
@verbatim
@foreach (Auth::user()->guilds as $guild)
    {{ $guild->name }}
@endforeach
@endverbatim
            </code></pre>
        </div>

    </section>





    

@endsection