<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;


    public array $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Message')
            ->greeting('Hallo ' . $this->contact['customer_service_title'])
            ->line('Kamu menerima pesan dari ' . $this->contact['full_name'])
            ->line('Email: ' . $this->contact['email'])
            ->line('Nomor Telepon: ' . $this->contact['phone_number'])
            ->line('Nama Perusahaan: ' . $this->contact['company_name'])
            ->line('Pesan: ' . $this->contact['message'])
            ->line('Terima kasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
