@extends ('docs._base')
@section ('docs.title', 'Blade Templating')
@section ('docs.hero.title', 'Blade Templating')
@section ('docs.hero.subtitle', 'Display your application data')

@section ('docs.content')

    <section class="section" id="about">
        <div class="content">
            <h1 class="title is-4">
                <a href="#about">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                About Blade templating
            </h1>
            <p>Laravel provides the Blade templating engine for rendering data quicky and easily on views. We can combine this rendering engine with our data to process and display user and/or Discord data on the application.</p>
            <p>For example, we can use the following snippet to display the currently logged in user's name anywhere on the page:</p>
            <pre><code>
@verbatim
@auth
Hello, {{ Auth::user()->getDisplayName() }}!
@endauth
@endverbatim
            </code></pre>
            <p>Or we can use a simple <code>foreach</code> loop to display the user's guilds:</p>
            <pre><code>
@verbatim
@foreach (Auth::user()->guilds as $guild)
    {{ $guild->name }}
@endforeach
@endverbatim
            </code></pre>
        </div>
    </section>

    <section class="section">
        <div class="content">
            <p><a href="https://laravel.com/docs/8.x/blade"><i class="fad fa-chevron-right fa-fw"></i> Read up on Blade Templates here</a></p>
        </div>
    </section>

@endsection