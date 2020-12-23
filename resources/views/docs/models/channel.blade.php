@extends ('docs._base')
@section ('docs.title', 'Channel (Model)')
@section ('docs.hero.title', 'Channel')
@section ('docs.hero.subtitle', 'An object representing a Discord Channel')

@section ('docs.content')

    <section class="section" id="description">
        <h1 class="title is-4">
            <a href="#description">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Description
        </h1>

        <p>The channel model represents an instance of a text or voice channel that exists in a given Discord <a href="{{ url('docs/models/guild') }}">guild</a>.</p>
    </section>

    <section class="section" id="attributes">
        <h1 class="title is-4">
            <a href="#attributes">
                <i class="fal fa-hashtag fa-fw"></i>
            </a>
            Attributes
        </h1>

        <p>A channel model will represent the <a href="https://discord.com/developers/docs/resources/channel#channel-object-channel-structure">Discord Channel structure</a> when successfully returned. You can access these directly using the <code>-></code> operator.</p>
    </section>

@endsection