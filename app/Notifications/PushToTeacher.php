<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PushToTeacher extends Notification
{

    use Queueable;
    public $url;
    public $user_id;
    public $start;
    public $end;
    public $msg;
    public $btn;

    public function __construct($url, $user_id, $start, $end, $msg, $btn)
    {
        $this->url = $url;
        $this->user_id = Hash::make($user_id);
        $this->start = $start;
        $this->end = $end;
        $this->msg = $msg;
        $this->btn = $btn;
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('سامانه حاضرم')
            ->icon('/notification-icon.png')
            ->body($this->msg)
            ->action($this->btn, $this->url . "/" . $this->id . "/" . $this->start . "/" . $this->end);
    }

}
