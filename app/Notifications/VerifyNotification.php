<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyNotification extends Notification
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
            ->greeting('Dear ' . $notifiable->name)
            ->line('Akun kamu sudah ter-verifikasi oleh admin, silahkan login untuk melakukan voting di pemirafeb.site atau klik tombol dibawah ini.')
            ->action('Vote Sekarang', url('http://pemirafeb.site/login'))
            ->line('atau, hubungi contact person yang disediakan.')
            ->line('Terima kasih telah melakukan register di pemirafeb.site, jika ada masalah terkait penggunaan website, harap hubungi admin atau chat contact person berikut:
            081234567890');
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
