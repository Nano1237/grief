<?php

/**
 * The ConfigLoader, loads .ini files and stores them in a property (if needed).
 * At the moment it just load the main config.ini
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class ConfigLoader {

    /**
     * The global config.ini cached
     * @var array
     */
    private static $globalConfig;

    /**
     * Gets the config.ini and parses it into a array
     * @return array
     */
    private static function setGlobalConfig() {
        return parse_ini_file(GRIEF_PATH . '/config.ini');
    }

    /**
     * Retursn the private globalConfig Property or sets this property if its not defined
     * @return array
     */
    public static function getGlobalConfig() {
        if (!isset(self::$globalConfig)) {
            self::$globalConfig = self::setGlobalConfig();
        }
        return self::$globalConfig;
    }

}
