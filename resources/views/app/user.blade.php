@extends ('_layouts.base')

@section ('page.title', Auth::user()->getDisplayName())
@section ('hero.size', 'is-medium')
@section ('hero.foot')

    <div class="container">
            
        <article class="media">
            <figure class="media-left">
                <p class="image">
                    <img class="is-rounded" src="{{ Auth::user()->avatar }}"/>
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <h1 class="title is-2">Hello, {{ Auth::user()->getDisplayName() }}!</h1>
                    <h2 class="subtitle is-4">This is your profile page, testing Disboard's API functionality.</h2>
                </div>
            </div>
        </article>

    </div>

@endsection

@section ('page.content')

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-4">Disboard User Object</h1>
                <pre><code>{{ var_dump(Auth::user()->toArray()) }}</code></pre>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-4">User Guilds <small><code>Auth::user()->guilds</code></small></h1>
                
                @forelse (Auth::user()->guilds as $guild)

                    <div class="columns">
                    
                        <div class="column">
                            <div class="notification">
                                <article class="media">
                                    <figure class="media-left">
                                        <p class="image is-48x48">
                                            <img class="is-rounded" src="{{ $guild->image }}"/>
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content is-small">
                                            <h1 class="title is-4">{{ $guild->name }}</h1>
                                            <h2 class="subtitle is-6">{{ number_format($guild->channels->count()) }} channels</h2>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <div class="column">
                            <pre><code>{{ var_dump($guild) }}</code></pre>
                        </div>
                    
                    </div>

                @empty

                    <p>You are not in any guilds!</p>

                @endforelse

            </div>
        </div>
    </section>

@endsection