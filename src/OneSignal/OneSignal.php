<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/04/16
 * Time: 14.09
 */

namespace OneSignal;


class OneSignal
{
    static $applicationId = null;
    private static $BASEURL = 'https://onesignal.com/api/v1';
    static $restAPIKey;

    public static function init($applicationId, $restAPIKey)
    {
        self::$applicationId = $applicationId;
        self::$restAPIKey = $restAPIKey;
    }

    public static function call($endpoint, $method, $params)
    {
        if (!OneSignal::$applicationId || !OneSignal::$restAPIKey) {
            throw new \Exception("ApplicationKey not set. Use OneSignal\\OneSignal::init(\$applicationId, \$restAPIKey);");
        }

        $params['app_id'] = self::$applicationId;
        $params = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$BASEURL . '/' . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic ' . self::$restAPIKey));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        if (strtolower($method) == 'post') {
            curl_setopt($ch, CURLOPT_POST, TRUE);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }


}