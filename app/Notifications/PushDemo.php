<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PushDemo extends Notification
{

    use Queueable;
    public $url;
    public $user_id;
    public $start;
    public $end;


    public function __construct($url, $user_id, $start, $end  )
    {
        $this->url = $url;
        $this->user_id = Hash::make($user_id);
        $this->start = $start;
        $this->end = $end;

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
            ->body('برای ثبت حضور خود بر روی کلیک کنید')
            ->action('حاضرم', $this->url . "/" . $this->id . "/" . $this->start . "/" . $this->end);
    }

}
