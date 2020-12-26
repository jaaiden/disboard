@php use App\Models\Project; @endphp

@extends ('projects._layouts.base')
@section ('projects.title', $project->name)
@section ('hero.foot')
    <div class="container">
        <article class="media">
            <figure class="media-left">
                <p class="image is-128x128">
                    <img src="{{ $project->icon }}" class="is-rounded">
                </p>
            </figure>
            <div class="media-content">
                <div class="content is-large">
                    <h1 class="title is-1">{{ $project->name }}</h1>
                    <div class="tags are-medium">
                        @foreach (json_decode($project->categories) as $cat)
                        <span class="tag"><a href="{{ url("projects/$cat") }}">{{ $cat }}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection

@section ('projects.content')

    <section class="section">
        <div class="content">

            <p>{{ $project->description }}</p>
            
        </div>
    </section>

@endsection

@section ('page.js')

@endsection