<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kutia\Larafirebase\Messages\FirebaseMessage;
use Kutia\Larafirebase\Services\Larafirebase;

class FirebaseNotification extends Notification
{
    use Queueable;
    protected $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['firebase','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toFirebase($notifiable)
    {
        return (new FirebaseMessage)
            ->withTitle($this->data['title'])
            ->withBody($this->data['message'])
            ->withAdditionalData([
                'type'=>$this->data['type'],
                'message'=>$this->data['message'],
                'url'=>$this->data['url'],
                'file' => $this->data['file'],
                'id'=>$this->data['id'],
                'teacher'=>$this->data['teacher'],
                ])
            ->withPriority('high')->asNotification($this?->data['token'] ?? '11');

    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'title' => $this->data['title'],
            'body' => $this->data['message'],
            'type' => $this->data['type'],
            'url' => $this->data['url'],
            'file' => $this->data['file'],
            'id' => $this->data['id'],
            'teacher' => $this->data['teacher'],
        ];
    }
}
