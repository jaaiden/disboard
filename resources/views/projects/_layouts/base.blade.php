@extends ('_layouts.base')
@section ('page.title')
@yield ('projects.title') &raquo; Projects
@endsection
@section ('hero.size', 'is-medium')
@section ('hero.foot')

    <div class="container">
        <div class="content">
            <h1 class="title is-2">@yield ('projects.hero.title')</h1>
            <h2 class="subtitle is-4">@yield ('projects.hero.subtitle')</h2>
        </div>
    </div>

@endsection

@section ('page.content')

    <section class="section">
        <div class="container">
            <div class="columns">
            
                <div class="column is-one-quarter">
                    <section class="section">
                        @include ('projects._layouts.nav')
                    </section>
                </div>

                <div class="column">
                    @yield ('projects.content')
                </div>
            
            </div>
        </div>
    </section>

@endsection

@section ('page.js')
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/dracula.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection