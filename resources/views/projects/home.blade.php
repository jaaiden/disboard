@php use App\Models\Project; @endphp

@extends ('projects._layouts.base')
@section ('projects.title', 'Home')
@section ('projects.hero.title', 'Powered by Disboard')
@section ('projects.hero.subtitle', 'A showcase of applications built with Disboard')

@section ('projects.content')

    <section class="section">
        <div class="content">
            <h1 class="title">What is 'Powered by Disboard'?</h1>
            <p>We like to showcase community projects and applications that are using our framework. Below is a curated list of communities that use Disboard in some shape, way, or form. Whether than be directly building off of our framework or using it as a backend for an API, we want to show our appreciation by giving them some recognition!</p>
            <p>Have you built something with Disboard? Let us know! Post an issue with the <span class="tag is-info">showcase</span> tag on our <a href="https://github.com/zackdevine/disboard/issues/new" target="_blank">GitHub</a> repository and let us know!</p>
        </div>
    </section>

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

        @forelse (Project::orderByUniqueViews()->take(4)->get() as $featuredProject)

            <a href="{{ url("projects/view/$featuredProject->uuid") }}">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-96x96">
                            <img src="{{ $featuredProject->icon }}" class="is-rounded">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content is-small">
                            <h1 class="title is-4">{{ $featuredProject->name }}</h1>
                            <p class="has-text-black">
                                @if ($featuredProject->hasCategory('games'))
                                    <i class="fad fa-gamepad fa-fw fa-2x"></i>
                                @endif
                                @if ($featuredProject->hasCategory('music'))
                                    <i class="fad fa-music-alt fa-fw fa-2x"></i>
                                @endif
                                @if ($featuredProject->hasCategory('server-management'))
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

@endsection