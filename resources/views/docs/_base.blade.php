@extends ('_layouts.base')
@section ('page.title')
@yield ('docs.title') &raquo; Docs
@endsection
@section ('hero.size', 'is-medium')
@section ('hero.foot')

    <div class="container">
        <div class="content">
            <h1 class="title is-2">@yield ('docs.hero.title')</h1>
            <h2 class="subtitle is-4">@yield ('docs.hero.subtitle')</h2>
        </div>
    </div>

@endsection

@section ('page.content')

    <section class="section">
        <div class="container">
            <div class="columns">
            
                <div class="column is-one-quarter">
                    @include ('docs._nav')
                </div>

                <div class="column">
                    @yield ('docs.content')
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