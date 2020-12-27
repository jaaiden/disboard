@php use App\Models\User; @endphp

@extends ('_layouts.base')

@section ('page.title', Auth::user()->getDisplayName())
@section ('hero.size', 'is-medium')
@section ('hero.foot')

    <div class="container">
            
        <article class="media">
            <figure class="media-left">
                <p class="image is-128x128">
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

                <h1 class="title is-4">Discord User Object</h1>
                <pre><code>{{ var_dump(User::fromId(Auth::user()->user_id)->toArray()) }}</code></pre>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">

                <h1 class="title is-4">User Guilds</h1>
                
                <div class="columns">
                
                    <div class="column">
                        <ul>
                            @foreach (Auth::user()->guilds as $guild)
                            <li>{{ $guild->name }} ({{ $guild->id }})</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="column">
                        <pre><code>{{ var_dump(Auth::user()->guilds) }}</code></pre>
                    </div>
                
                </div>

            </div>
        </div>
    </section>

@endsection