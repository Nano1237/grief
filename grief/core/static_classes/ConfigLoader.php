<?php

/**
 * Description
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class ConfigLoader {

    private static $globalConfig;

    private static function setGlobalConfig() {
        return parse_ini_file(GRIEF_PATH.'/config.ini');
    }

    public static function getGlobalConfig() {
        if (isset(self::$globalConfig)) {
            return self::$globalConfig;
        }
        self::$globalConfig = self::setGlobalConfig();
        return self::$globalConfig;
    }

}
