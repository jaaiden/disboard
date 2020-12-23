@extends ('docs._base')
@section ('docs.title', 'Installing Disboard')
@section ('docs.hero.title', 'Installing Disboard')
@section ('docs.hero.subtitle', 'How to configure your new Disboard instance')

@section ('docs.content')

    <section class="section" id="prerequisites">
        <div class="content">
            <h1 class="title is-4">
                <a href="#prerequisites">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Prerequisites
            </h1>

            <p>To properly install and run Disboard, you must meet the <a href="https://laravel.com/docs/8.x/deployment#server-requirements" class="tag is-info">base server requirements of Laravel 8</a>.</p>
        </div>

        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-exclamation-triangle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        You must be running at <i>least</i> PHP 7.4 in order to install the necessary composer dependencies for Disboard.
                    </p>
                </div>
            </article>
        </div>

    </section>

    <section class="section" id="downloading">
        <div class="content">
            <h1 class="title is-4">
                <a href="#downloading">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Downloading Disboard
            </h1>

            <p>You can get the latest release of Disboard by cloning the <a href="https://github.com/zackdevine/disboard" class="tag is-info">GitHub repository</a> to your development workspace (recommended), or simply download the <a href="https://github.com/zackdevine/disboard/archive/master.zip" class="tag is-info">source code as a zip</a> file and extract it.</p>

            <p>Disboard (and inherently Laravel) utilize the <a href="https://getcomposer.org" class="tag is-info">Composer</a> package manager for installing required dependencies. If you already have Composer configured, you can start setting up Disboard by <code>cd</code>'ing into the folder and run <code>composer update</code>. This should start downloading all of the required packages that Disboard needs to function.</p>
        </div>
        
    </section>

@endsection