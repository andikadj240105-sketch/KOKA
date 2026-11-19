<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class NotifUserPWA extends Notification
{
    public $judul;
    public $pesan;
    public $urlTarget;

    // Menangkap judul, pesan, dan URL yang dikirim dari Controller
    public function __construct($judul, $pesan, $urlTarget = '/')
    {
        $this->judul = $judul;
        $this->pesan = $pesan;
        $this->urlTarget = $urlTarget;
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title($this->judul)
            ->body($this->pesan)
            ->icon('/icons/icon-192x192.png')
            ->data(['url' => $this->urlTarget]);
    }
}