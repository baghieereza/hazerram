<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PushToManager extends Notification
{

    use Queueable;
    public $class;
    public $teacher;
    public $start;
    public $end;
    public $tel;

    public function __construct($class, $teacher, $start, $end, $tel)
    {
        $this->class = $class;
        $this->teacher = $teacher;
        $this->start = $start;
        $this->end = $end;
        $this->tel = $tel;
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
            ->body("عدم برگذاری کلاس " . $this->class . "  توسط  معلم  " . $this->teacher . "  در تاریخ " . $this->start . " -" . $this->end . " ")
            ->action('متوجه شدم', "");
    }

}
