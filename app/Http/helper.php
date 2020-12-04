<?php

namespace App\Http;

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
     * @return \Kavenegar\Laravel\Message\KavenegarMessage
     */
    public static function sendSMS($name, $token1, $token2, $token3)
    {
        $call = new InvoicePaid();
        return $call->toKavenegar('wer', $name, $token1, $token2, $token3);
    }


    /**
     * @return string
     * @throws \Exception
     */
    public static function get5MinuteAfter()
    {
        $date = new DateTime;
        $date->modify('+5 minutes');
        return $date->format('Y-m-d H:i:s');
    }
}
