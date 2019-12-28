# Welcome to Disboard!

## What is Disboard

Disboard is a boilerplate for developing web applications for Discord bots. It is a starting point for web developers to have Discord user authentication built in to the application from the start. Developers can utilize this boilerplate to start working on their site idea without being dragged down with the hassle of setting up authentication systems, security, encryption, and every other tedius task that prevents them from working on their idea.

## What isn't Disboard

Disboard is ***not*** a fully-featured Discord bot site or dashboard. All Disboard provides is a starting point for developers to work from and bring their idea to life.

## Getting Started

❗️ Disboard is built with [Laravel](https://laravel.com). If you do not know Laravel or need a brush up on it, you can check the [Laravel Docs](https://laravel.com/docs/6.x) and/or [Laracasts](https://laracasts.com/skills/laravel) (video-based learning).

1. Clone this repository to your web server document root.

2. Read up on the [Laravel Server Requirements](https://laravel.com/docs/6.x#server-requirements) to verify you can use Disboard.

3. `cd` to the Disboard folder and install the necessary composer packages: `composer update`

4. Copy the example dotenv file: `cp .env.example .env`

5. Edit `.env` in your favorite text editor, and make sure to change the following values: `APP_NAME, APP_ENV, APP_DEBUG, APP_BASE_URL, DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DISCORD_KEY, DISCORD_SECRET`

6. Save the `.env` file and generate an application key: `php artisan key:generate`
    - **Make sure not to give out this key! Doing so will compromise your database and encryption!**

7. Migrate the user table to your database: `php artisan migrate`

And that's it! Make sure to add the callback URI to your bot's OAuth2 callback URI list. The format for this is `http(s)://your-domain.tld/auth/callback`. Once you do that, visit the domain Disboard is running on to test Discord authentication! If everything works correctly, you should see your Discord name and avatar appear after authorizing the login with your account.

## Next Steps

Now that Disboard is up and running, you are free to add and modify Disboard to shape your new bot dashboard or site! You can find the authentication logic in `app/Http/Controllers/AuthController.php` if you need to make changes such as including the user's guild list in the authorization process. You can see how to make this change (and other changes) at Disboard's documentation site (currently a work-in-progress).

## Contributing

If you would like to contribute to Disboard, feel free to fork this repository and submit PRs with your changes. I tend to be busy, so reviewing and implementing the changes may take some time.

Keep in mind this project is just a starting point, so large features may or may not be implemented.

## Special Thanks

- [Laravel](https://laravel.com) for a great web development framework.
- [Bulma](https://bulma.io) for a nice looking CSS framework.
- [Socialite](https://github.com/laravel/socialite) for a fluent OAuth implementation interface.
- [Discord](https://discordapp.com) for a great chat and voice platform.
