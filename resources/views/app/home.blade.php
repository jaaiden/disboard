@extends ('_layouts.base')

@section ('page.title', 'Welcome!')
{{-- @section ('hero.size', 'is-fullheight') --}}
@section ('hero.body')

    <div class="container">
        <div class="content">
            <h1 class="title is-2">Welcome to {{ config('app.name') }}!</h1>
            <h2 class="subtitle is-4">A secure and robust starting template for crafing Discord bot web applications.</h2>
            <div class="buttons">
                <a href="#" class="button is-dark">
                    <span class="icon">
                        <i class="fad fa-chevron-down"></i>
                    </span>
                    <span>Learn more</span>
                </a>
                <a href="#" class="button is-dark">
                    <span class="icon">
                        <i class="fad fa-terminal"></i>
                    </span>
                    <span>Get started</span>
                </a>
                <a href="#" class="button is-dark">
                    <span class="icon">
                        <i class="fab fa-github"></i>
                    </span>
                    <span>View source</span>
                </a>
            </div>
        </div>
    </div>

@endsection

@section ('page.content')

    <section class="section">
        <div class="container">

            <div class="content">
                <h1 class="title is-4">What is Disboard?</h1>
                <p>Disboard is a boilerplate for developing web applications for Discord bots. It is a starting point for web developers to have Discord user authentication built in to the application from the start. Developers can utilize this boilerplate to start working on their site idea without being dragged down with the hassle of setting up authentication systems, security, encryption, and every other tedius task that prevents them from working on their idea.</p>
            </div>

            <div class="notification is-warning">
                <article class="media">
                    <figure class="media-left">
                        <p><i class="fad fa-bell-on fa-3x"></i></p>
                    </figure>
                    <div class="media-content">
                        <p>
                            <strong>Disboard is not a fully-featured Discord bot site or dashboard.</strong><br>
                            All Disboard provides is a starting point for developers to work from and bring their idea to life.
                        </p>
                    </div>
                </article>
            </div>
                
        </div>    
    </section>

@endsection