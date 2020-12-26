@php use Illuminate\Support\Str; @endphp

@extends ('projects._layouts.base')
@section ('projects.title', Str::title(Str::replaceFirst('-', ' ', $category)))
@section ('projects.hero.title', Str::title(Str::replaceFirst('-', ' ', $category)))

@section ('projects.content')

    <section class="section">
        <div class="content">{{ $projects->links() }}</div>

        @forelse ($projects as $project)

            <a href="{{ url("projects/view/$project->uuid") }}">
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-96x96">
                            <img src="{{ $project->icon }}" class="is-rounded">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <h1 class="title is-4">{{ $project->name }}</h1>
                            <p>{{ Str::limit($project->description, 30) }} &middot; {{ $project->project_url }}</p>
                        </div>
                    </div>
                </article>
            </a>

        @empty
            <div class="content">
                <p>There are no projects to show for this category.</p>
            </div>
        @endforelse

        <div class="content">{{ $projects->links() }}</div>
    </section>

@endsection