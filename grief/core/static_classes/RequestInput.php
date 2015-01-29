<?php

/**
 * This Class Handles the Input from (in this case) AngularJS
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class RequestInput {

    /**
     * Stores the decoded Input
     * @var array
     */
    private static $input;

    /**
     * Returns the input data
     * @return array
     */
    public static function input() {
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

}
