<?php

/**
 * Easy to use Requestmethod analysing
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class RequestMethod {

    private static $methodLower;
    private static $methodUpper;
    private static $possibleMethods;

    /**
     * Sets all possible Attributes of this object
     * @param String $method The current Request Method
     */
    private static function setRequestMethods($method) {
        self::$methodLower = strtolower($method);
        self::$methodUpper = strtoupper($method);
        //Saves the Methods set in the ini as lowercase
        $s = ConfigLoader::getGlobalConfig();
        $ret = array();
        foreach ($s['ressource_options'] as $value) {
            array_push($ret, strtolower($value));
        }
        self::$possibleMethods = $ret;
    }

    /**
     * Checks if the current request method (or the passed one) is allowed (set in the config.ini)
     * @param String $method The Method that is checked
     * @return Boolean
     */
    public static function requestAllowed($method = false) {
        if (!isset($method) || !$method) {
            $method = self::getMethodLower();
        } else {
            $method = strtolower($method);
        }
        return in_array($method, self::getPossibleMethods());
    }

    /**
     * Returns the possible methods set in the config.ini
     * @return Array
     */
    public static function getPossibleMethods() {
        if (!isset(self::$possibleMethods)) {
            self::setRequestMethods($_SERVER['REQUEST_METHOD']);
        }
        return self::$possibleMethods;
    }

    /**
     * Returns the current requestmethod all in uppercase letters
     * @return String
     */
    public static function getMethodUpper() {
        if (!isset(self::$methodUpper)) {
            self::setRequestMethods($_SERVER['REQUEST_METHOD']);
        }
        return self::$methodUpper;
    }

    /**
     * Returns the current requestmethod all in lowercase letters
     * @return String
     */
    public static function getMethodLower() {
        if (!isset(self::$methodLower)) {
            self::setRequestMethods($_SERVER['REQUEST_METHOD']);
        }
        return self::$methodLower;
    }

}
