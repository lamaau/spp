<?php

namespace Modules\Master\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ImportHasFailedNotification extends Notification
{
    use Queueable;

    /** @var User */
    protected $user;

    /** @var string */
    protected $filename;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(object $user, string $filename, string $message = null)
    {
        $this->user = $user;
        $this->filename = $filename;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Import Dokumen')
            ->markdown('master::mail.import', ['user' => $this->user, 'filename' => $this->filename, 'message' => $this->message]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
