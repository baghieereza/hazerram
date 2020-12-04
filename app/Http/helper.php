<?php

namespace App\Http;

use App\Models\sms_logs;
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
        $result = json_decode($result, TRUE);

    }


    public static function smsLog($course_id, $text)
    {
        return sms_logs::create([
            'course_id' => $course_id,
            'text' => $text,
            'date' => date("Y-m-d H:m:s")
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
}
