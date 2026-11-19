<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifPusher implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public $userId;
    public $title;
    public $message;

    // Menerima data dari Controller
    public function __construct($userId, $title, $message)
    {
        $this->userId = $userId;
        $this->title = $title;
        $this->message = $message;
    }

    // Menentukan channel khusus untuk user tertentu
    public function broadcastOn()
    {
        return new Channel('user-notif-' . $this->userId);
    }

    // Nama event yang akan didengarkan oleh JavaScript
    public function broadcastAs()
    {
        return 'pesanan-baru';
    }
}