<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page.title') &raquo; {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <link rel="icon" href="{{ asset('favicon.png') }}"> --}}
        <script src="https://kit.fontawesome.com/aebee420ce.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <section class="hero @yield('hero.size', 'is-large') @yield('hero.color', 'is-dark') is-bold" id="page-header">
        
            <div class="hero-head">
            
                @include ('_layouts.nav')

            </div>

            <div class="hero-body">
            
                @yield ('hero.body')

            </div>

            <div class="hero-foot" style="margin-top: -40px; margin-bottom: 40px;">
            
                @yield ('hero.foot')

            </div>

        </section>

        @yield ('page.content')

        @include ('_layouts.footer')

        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
                // Get all "navbar-burger" elements
                const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
                // Check if there are any navbar burgers
                if ($navbarBurgers.length > 0) {
                    // Add a click event on each of them
                    $navbarBurgers.forEach( el => {
                        el.addEventListener('click', () => {
                            // Get the target from the "data-target" attribute
                            const target = el.dataset.target;
                            const $target = document.getElementById(target);
                            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                            el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');
                        });
                    });
                }
            });
        </script>
        
        @yield('page.js')

    </body>

</html>