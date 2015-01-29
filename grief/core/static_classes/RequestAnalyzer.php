<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RequestAnalyzer {

    /**
     * Here is the Requestname stored all in lower case letters
     * @var String
     */
    private static $methodLower;

    /**
     * Here is the Requestname stored all in upper case letters
     * @var String
     */
    private static $methodUpper;

    /**
     * Here are all possible methods stored that are allowed by the server (defined in the config.ini)
     * @var array 
     */
    private static $possibleMethods;

    /**
     * Stores the decoded Input
     * @var array
     */
    private static $input;

    /**
     *
     * Contains the Requestheader as Array
     * @var array
     */
    private static $header;

    /**
     * 
     * Returns all Header data, or if needed just a certain Header by key
     * @param String|Boolean $certainHeader The key (headername)
     * @return String
     */
    public static function getHeader($certainHeader = false) {
        if (!isset(self::$header)) {
            self::setHeader();
        }
        if ($certainHeader) {
            return self::$header[$certainHeader];
        }
        return self::$header;
    }

    private static function setHeader() {
        self::$header = getallheaders();
    }

    /**
     * Returns the input data (getter for the self::$input property)
     * @return array
     */
    public static function getInput() {
        if (!isset(self::$input)) {
            self::setInput();
        }
        return self::$input;
    }

    /**
     * Gets the json send by AngularJS and decodes it.
     * Then the decoded Input is stored in the input property
     * @return type
     */
    private static function setInput() {
        $postdata = file_get_contents("php://input");
        if (trim(strlen($postdata)) === 0) {
            self::$input = array();
            return;
        }
        self::$input = json_decode($postdata, true);
    }

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
