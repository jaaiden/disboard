@extends ('docs._base')
@section ('docs.title', 'Configuring Disboard')
@section ('docs.hero.title', 'Configuring Disboard')
@section ('docs.hero.subtitle', 'Changing application configuration options')

@section ('docs.content')

    <section class="section" id="dotenv">
        <div class="content">
            <h1 class="title is-4">
                <a href="#dotenv">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Environment file
            </h1>
            <p>The environment file (.env) defines the private configuration data for the application to run. This file doesn't exist to start with, but you can copy the example file (<code>cp .env.example .env</code>) and start editing it.</p>
        </div>

        <div class="notification is-danger">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-exclamation-triangle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Important</strong><br>
                        The .env file must <strong>NOT</strong> be committed to your source code repository! It contains extremely important information that when made public could jeoparize the security of your application!
                    </p>
                </div>
            </article>
        </div>

        <div class="content">
            <p>After creating the environment file, run <code>php artisan key:generate</code> to generate the encryption key. This key is used for hashing passwords and other secure data. Next open up the environment file and fill in the fields that you need for your application. Be sure to check the <code>DISCORD_</code> prefixed fields at the bottom of the file.</p>
        </div>

    </section>

    <section class="section" id="migration">
        <div class="content">
            <h1 class="title is-4">
                <a href="#migration">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Database migration
            </h1>
            <p>User authentication utilizes the <code>users</code> table in the database. In order to create this database, run <code>php artisan migrate</code>. This command will create the necessary database tables found in the <code>database/migrations</code> directory.</p>
        </div>

    </section>

    <section class="section" id="authentication">
        <div class="content">
            <h1 class="title is-4">
                <a href="#authentication">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Discord authentication
            </h1>
            <p>Discord authentication is supported out-of-the-box with Disboard. Routes and callback handles have already been created (see <code>app/Http/Controllers/AuthController.php</code> and <code>routes/auth.php</code>). To connect the authentication routes with Discord, navigate to your Discord application and add <code>{{ url('auth/callback') }}</code> to the OAuth callback list.</p>
        </div>

    </section>

@endsection