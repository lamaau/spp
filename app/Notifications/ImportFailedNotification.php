<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ImportFailedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;
    protected $subtitle;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $subtitle)
    {
        $this->message = $message;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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
            'icon' => 'fad fa-times',
            'background' => 'bg-danger',
            'title' => "Dokumen tidak dapat diproses",
            'subtitle' => $this->subtitle,
            'message' => $this->message,
        ];
    }
}
