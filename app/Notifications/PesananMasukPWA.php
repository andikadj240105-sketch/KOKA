<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel; // <-- WAJIB ADA
use NotificationChannels\WebPush\WebPushMessage; // <-- WAJIB ADA

class PesananMasukPWA extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return [WebPushChannel::class]; // Kirim via Web Push
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Pesanan Baru Masuk!')
            ->body('Ada booking layanan baru, segera cek panel admin.')
            ->icon('/icons/icon-192x192.png')
            ->data(['url' => '/admin/layanan']);
    }
}