@extends ('docs._base')
@section ('docs.title', 'Helpers')
@section ('docs.hero.title', 'Helpers')
@section ('docs.hero.subtitle', 'Global functions for easy data access')

@section ('docs.content')

    <section class="section" id="about">
        <div class="content">
            <h1 class="title is-4">
                <a href="#about">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                About
            </h1>
            <p>Disboard provides a global helper class (<code>app/Http/Helpers.php</code>) that can be accessed from anywhere in the application without requiring any specific class includes. This class contains utility functions ranging from calling the Discord API directly to simply getting a user's avatar. This class is internally used by the provided Disboard models for retrieving aggregate data as well.</p>
        </div>
    </section>

    <section class="section" id="available-functions">
        <div class="content">
            <h1 class="title is-4">
                <a href="#available-functions">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Available functions
            </h1>
            <p>By default, Disboard comes with the following default helper functions:</p>
            <h2 class="subtitle is-5">Git</h2>
            <ul>
                <li><a href="#helper-git-getCurrentGitCommit">getCurrentGitCommit($short)</a></li>
                <li><a href="#helper-git-getGitCommitVersion">getGitCommitVersion()</a></li>
            </ul>
            <h2 class="subtitle is-5">Discord API (dapi)</h2>
            <ul>
                <li><a href="#helper-dapi-dapi">dapi($url, $method, $asUser, $user, $opts)</a></li>
                <li><a href="#helper-dapi-dapi_getUserAvatar">dapi_getUserAvatar($userid, $discrim)</a></li>
                <li><a href="#helper-dapi-dapi_getUserGuilds">dapi_getUserGuilds($user)</a></li>
                <li><a href="#helper-dapi-dapi_getGuild">dapi_getGuild($id)</a></li>
            </ul>
        </div>
    </section>



    {{-- Available functions --}}

    <section class="section" id="helper-git-getCurrentGitCommit">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-git-getCurrentGitCommit">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                getCurrentGitCommit($short)
            </h1>
            <p>Returns the current git commit hash for the master branch.</p>
            <p>
                <strong>Parameters</strong><br>
                <code>$short</code> (default: false) - Return a shortened version of the hash (7 characters)
            </p>
        </div>
    </section>

    <section class="section" id="helper-git-getGitCommitVersion">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-git-getGitCommitVersion">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
               getGitCommitVersion()
            </h1>
            <p>Returns <code>getCurrentGitCommit(true)</code> along with the date/time of the commit. This is currently being used to show the current application version in the footer.</p>
        </div>
    </section>

    <section class="section" id="helper-dapi-dapi">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-dapi-dapi">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                dapi($url, $method, $asUser, $user, $opts)
            </h1>
            <p>Calls the Discord API with the provided information. Returns the result of the API call.</p>
            <p>
                <strong>Parameters</strong><br>
                <code>$url</code> - The Discord API endpoint to call (ex: 'users/@@me/guilds').<br>
                <code>$method</code> (default: 'get') - The http method to use. Only 'get', 'post', 'patch', and 'delete' are currently implemented.<br>
                <code>$asUser</code> (default: false) - Whether or not to call the API as a user. If true, the <code>$user</code> parameter must be set to a valid user.<br>
                <code>$user</code> (default: null) - The user to call the API as. Ignored if <code>$asUser</code> is false.<br>
                <code>$opts</code> (default: array()) - Additional http options to add to the API call.
            </p>
        </div>
        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-info-circle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        This function should <strong>only</strong> be used as a fallback if other helper functions/model attributes don't already exist!
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="section" id="helper-dapi-dapi_getUserAvatar">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-dapi-dapi_getUserAvatar">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                dapi_getUserAvatar($userid, $discrim)
            </h1>
            <p>Gets the specified user's avatar, or returns a default one if it doesn't exist.</p>
            <p>
                <strong>Parameters</strong><br>
                <code>$userid</code> - The Discord User ID to get the avatar for.<br>
                <code>$discrim</code> (default: '0001') - The user's discriminator. Used for retrieving the default Discord avatar for this user.
            </p>
            <p>This function will return a gif if the user has an animated avatar, or a png if not.</p>
        </div>
        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-info-circle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        You should call the <code>avatar</code> attribute on the user object instead of calling this function directly!
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="section" id="helper-dapi-dapi_getUserGuilds">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-dapi-dapi_getUserGuilds">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                dapi_getUserGuilds($user)
            </h1>
            <p>Returns a list of the specified user's guilds.</p>
            <p>
                <strong>Parameters</strong><br>
                <code>$user</code> - The user instance to get the guilds from.
            </p>
        </div>
        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-info-circle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        You should call the <code>guilds</code> attribute on the user object instead of calling this function directly!
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="section" id="helper-dapi-dapi_getGuild">
        <div class="content">
            <h1 class="title is-5">
                <a href="#helper-dapi-dapi_getGuild">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                dapi_getGuild($id)
            </h1>
            <p>Returns a Discord guild object based on the id provided.</p>
            <p>
                <strong>Parameters</strong><br>
                <code>$id</code> - The guild's Discord ID.
            </p>
        </div>
        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-info-circle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        It's recommended to instead call the <code>Guild::fromId($id)</code> static function in the Guild model.
                    </p>
                </div>
            </article>
        </div>
    </section>

@endsection