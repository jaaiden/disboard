@php use App\Models\Project; @endphp

@extends ('projects._layouts.base')
@section ('projects.title', 'Home')
@section ('projects.hero.title', 'Powered by Disboard')
@section ('projects.hero.subtitle', 'Featured and upcoming projects built with Disboard')

@section ('projects.content')

    <section class="section">
        <div class="content">
            <h1 class="title is-4">Latest Apps</h1>
        </div>

        @forelse (Project::orderBy('created_at', 'desc')->take(4)->get() as $latestProject)

            <a href="{{ url("projects/view/$latestProject->uuid") }}">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-96x96">
                            <img src="{{ $latestProject->icon }}" class="is-rounded">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content is-small">
                            <h1 class="title is-4">{{ $latestProject->name }}</h1>
                            <p class="has-text-black">
                                @if ($latestProject->hasCategory('games'))
                                    <i class="fad fa-gamepad fa-fw fa-2x"></i>
                                @endif
                                @if ($latestProject->hasCategory('music'))
                                    <i class="fad fa-music-alt fa-fw fa-2x"></i>
                                @endif
                                @if ($latestProject->hasCategory('server-management'))
                                    <i class="fad fa-server fa-fw fa-2x"></i>
                                @endif
                            </p>
                        </div>
                    </div>
                </article>
            </a>

        @empty
            <p>There are no projects to show here... :(</p>
        @endforelse

    </section>

    <section class="section">
        <div class="content">
            <h1 class="title is-4">Featured Apps</h1>

        </div>
    </section>

@endsection