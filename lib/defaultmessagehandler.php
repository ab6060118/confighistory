<?php

namespace OCA\Config_History;

class DefaultMessageHandler implements IMessageHandler {
    const MESSAGE_HANDLER_APP = "default";

    protected $l;

    public function __construct(IL10N $l) {
        $this->l = $l;
    }

    /*
     * @param Array
     * @param String
     * @return Array
     */
    public function handle($params, $appName = "") {
        $key = $params[1];
        $key = self::keyGenerator($key, $appName);
        $params[1] = $key;
        return $params;
    }

    public function getAppName() {
        return self::MESSAGE_HANDLER_APP;
    }

    /*
     *
     * @param String
     * @return String
     */
    public static function keyGenerator($key, $appName = "") {
        return $appName."_".$key;
    }
}
