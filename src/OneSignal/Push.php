<?php

namespace OneSignal;

class Push
{

    public static function send($ids, $options)
    {
        $tags = array_key_exists('tags', $options) ? $options['tags'] : [];
        if (is_string($ids)) {
            $ids = [$ids];
        }
        if (!is_array($ids)) {
            throw new \Exception("Expected array found: " . gettype($ids));
        }

        foreach ($ids as $id) {
            $tags[] = [
                'key' => 'userId',
                'relation' => '=',
                'value' => $id
            ];
        }

        $params = array_merge($options, ['tags' => $tags]);


        var_dump(OneSignal::call('notifications', 'POST', $params));
        exit;

        return "";
    }


}