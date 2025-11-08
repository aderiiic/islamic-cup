<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeTeamOwnerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $resetUrl)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Välkommen till Islamic Cup – sätt ditt lösenord')
            ->greeting('Assalamu Alaikum ' . ($notifiable->name ?? ''))
            ->line('Ett konto har skapats för dig som lagägare.')
            ->action('Sätt nytt lösenord', $this->resetUrl)
            ->line('Efter att du satt lösenord kan du logga in och börja hantera ditt lag.')
            ->line('Behöver du hjälp? Svara på detta mejl.');
    }
}
