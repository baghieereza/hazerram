<?php

namespace App\Http;

use App\Models\Sms_logs;
use App\Notifications\InvoicePaid;
use DateTime;

/**
 * Class helper
 *
 * @package \App\Http
 */
class helper
{


    /**
     * sending sms
     *
     * @param $name
     * @param $token1
     * @param $token2
     * @param $token3
     *
     * @param $number
     *
     * @return void
     */
    public static function sendSMS($name, $token1, $token2, $token3, $number)
    {

        $token2 = str_replace(' ', '-', $token2);
        $url = 'https://api.kavenegar.com/v1/356C706E434D3275795150384B7456367163356B44413D3D/verify/lookup.json?receptor='
            . $number . "&token=" . $token1 . "&token2=" . $token2 . "&token3=" . $token3 . "&template=" . $name;
        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $result = curl_exec($ch);
        return json_decode($result, TRUE);

    }


    public static function smsLog($course_time_id, $text, $token, $user_id)
    {
        return Sms_logs::create([
            'course_time_id' => $course_time_id,
            'text' => $text,
            'token' => $token,
            'teacher_id' => $user_id
        ]);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function get5MinuteAfter()
    {
        $date = new DateTime;
        $date->modify('+5 minutes');
        return $date->format('Y-m-d H:i');
    }


    /**
     * @return string
     * @throws \Exception
     */
    public static function get5MinuteEarlier()
    {
        $date = new DateTime;
        $date->modify('-5 minutes');
        return $date->format('Y-m-d H:i');
    }


    /**
     * @param $time
     * @param $minute
     *
     * @return string
     * @throws \Exception
     */
    public static function addMinuteToTime($time, $minute)
    {
        $date = new DateTime($time);
        $date->modify('+' . $minute . ' minutes');
        return $date->format('Y-m-d H:i:s');
    }


    public static function getUsersPerMinuteToPushNotification($users, $notif_count)
    {
        $usersTOPush = [];
        for ($i = 0; $i < 1; ++$i) {
            $usersTOPush[] = $users[$i];
         }
         return $usersTOPush;
    }
}
