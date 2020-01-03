<?php 
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class VerifyRegistration extends Notification
{
    use Queueable;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Confirm Your Email...')
            ->action('Click this link to active your account',route('user.verification',$this->user->remember_token))
            ->link('Thank You for being with us');
    }

    public function toArray($notifiable)
    {
        return [//
        ];
    }
}


?>