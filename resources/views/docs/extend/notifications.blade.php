@extends ('docs._base')
@section ('docs.title', 'Notifications')
@section ('docs.hero.title', 'Notifications')
@section ('docs.hero.subtitle', 'Inform users instantly and easily with this one trick!')

@section ('docs.content')

    <section class="section" id="getting-started">
        <div class="content">
            <h1 class="title is-4">
                <a href="#getting-started">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Getting started
            </h1>
            <p>Disboard provides a simple way of sending user notifications through Discord directly to your users. Utilizing Laravel's built-in <a href="https://laravel.com/docs/8.x/notifications">Notifiable facade</a> and a custom provider for Discord, you can start writing your own notifications and start sending them instantly!</p>
            <p>These notifications can be used to inform your users that someone started following their profile, they levelled up, or really anything else! You can start creating your own notification with the <code>php artisan make:notification</code> command.</p>
            <p>In this example, we'll make an example notification where a user leaves a comment on another user's profile.</p>
        </div>
        <div class="notification is-warning">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-exclamation-triangle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        You must make a <strong>Bot Application</strong> and add it to at least one Discord server before you can send messages to users. Once you do those steps, run <code>php artisan discord:setup</code> to connect your application to the Discord gateway.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="section" id="creating-the-notification">
        <div class="content">
            <h1 class="title is-4">
                <a href="#creating-the-notification">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Creating the notification
            </h1>
            <p>We'll start by creating our new notification class. Run <code>php artisan make:notification UserCommentNotification</code>. A new folder named Notifications will be created in your <code>app</code> folder, along with your new notification class:</p>
            <pre><code>
@verbatim
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
@endverbatim
            </code></pre>
            <p>Currently this notification only sends via email, but we just need to add a few things to make it work with Discord. Start by adding the following using statements at the top:</p>
            <pre><code>
use NotificationChannels\Discord\DiscordChannel;
use NotificationChannels\Discord\DiscordMessage;
            </code></pre>
            <p>These classes allow us to use Laravel's built-in Discord notification channels out-of-the-box. Next, modify (or replace) the return in the <code>via($notifiable)</code> function to add the Discord route:</p>
            <pre><code>
/**
 * Get the notification's delivery channels.
 *
 * @param  mixed  $notifiable
 * @return array
 */
public function via($notifiable)
{
    return [DiscordChannel::class];
}
            </code></pre>
            <p>Last thing we need in the notification class is the message we're sending to Discord. This is provided in a <code>toDiscord()</code> function. Here's an example message we can send to the user:</p>
            <pre><code>
public function toDiscord ($notifiable)
{
    return DiscordMessage::create("{$this->user->getDisplayName()} left a comment on your profile!");
}
            </code></pre>
            <p>This will direct message the user on Discord when the notification is sent.</p>
            <p>Here's the final result of the class, with comments omitted:</p>
            <pre><code>
namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Discord\DiscordChannel;
use NotificationChannels\Discord\DiscordMessage;

class UserCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return [DiscordChannel::class];
    }
    
    public function toDiscord($notifiable)
    {
        return DiscordMessage::create("{$this->user->getDisplayName()} left a comment on your profile!");
    }
}
            </code></pre>
        </div>
    </section>

    <section class="section" id="invoking">
        <div class="content">
            <h1 class="title is-4">
                <a href="#invoking">
                    <i class="fal fa-hashtag fa-fw"></i>
                </a>
                Invoking the notification
            </h1>
            <p>Finalizing the notification class, you need to specify which model we're calling the notification on. In the case of our example, we will be calling the notification from the <code>User</code> model. Because of this, we need to call the <code>notify()</code> function from an instance of a user.</p>
        </div>
        <div class="notification is-info">
            <article class="media">
                <figure class="media-left">
                    <p class="image"><i class="fad fa-info-circle fa-3x"></i></p>
                </figure>
                <div class="media-content">
                    <p>
                        <strong>Note</strong><br>
                        The <code>User</code> model already has the proper function defined for routing notifications to a channel, but if you want to set this up on another model, you must implement the <code>routeNotificationToDiscord()</code> function yourself!
                    </p>
                </div>
            </article>
        </div>
        <div class="content">
            <p>To send the notification, call the <code>notify()</code> function on a user model from anywhere in your application:</p>
            <pre><code>
// Add include for notification
use App\Notifications\UserCommentNotification;

// Call it
$user->notify(new UserCommentNotification($commenter));
            </code></pre>
            <p>Have fun sending notifications!</p>
            <img src="{{ asset('img/docs/extend/notifications/direct_message.png') }}" width="618" height="110" />
        </div>
    </section>

    <section class="section">
        <div class="content">
            <p><a href="https://laravel.com/docs/8.x/notifications"><i class="fad fa-chevron-right fa-fw"></i> Read up on Laravel Notifications here</a></p>
        </div>
    </section>

@endsection