@extends ('docs._base')
@section ('docs.title', 'Getting Started with Templates')
@section ('docs.hero.title', 'Getting Started with Templates')
@section ('docs.hero.subtitle', 'Automate your page data')

@section ('docs.content')

    <section class="section" id="about">
        <div class="content">
            <h1 class="title is-4">
                <a href="#about">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                About templating
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
        </div>
    </section>

@endsection