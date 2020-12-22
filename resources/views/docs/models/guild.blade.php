@extends ('docs._base')
@section ('docs.title', 'Guild (Model)')
@section ('docs.hero.title', 'Guild')
@section ('docs.hero.subtitle', 'An object representing a Discord Guild (Server)')

@section ('docs.content')

    <section class="section" id="description">
        <h1 class="title is-4">
            <a href="#description">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Description
        </h1>

        <p>The guild model represents a guild that exists on Discord. An instance of a guild model contains basic information about the guild.</p>
    </section>

    <section class="section" id="attributes">
        <h1 class="title is-4">
            <a href="#attributes">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Attributes
        </h1>

        <p>A guild model will represent the <a href="https://discord.com/developers/docs/resources/guild#guild-object-guild-structure">Discord Guild structure</a> when successfully returned. You can access these directly using the <code>-></code> operator.</p>
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