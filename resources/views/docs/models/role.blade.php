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

        <p>A role model will represent the <a href="https://discord.com/developers/docs/topics/permissions#role-object-role-structure">Discord Role structure</a> when successfully returned. You can access these directly using the <code>-></code> operator.</p>
    </section>

@endsection