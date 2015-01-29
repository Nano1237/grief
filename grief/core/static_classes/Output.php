<?php

/**
 * The Output Class MUST be used (that means the return of the controller methiod will be formed to a json string for example)
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class Output {

    /**
     * Returns the Data by the value passed in the first property (if the method exits)
     * @param String $returnType The Return type (like json or xml)
     * @param Variable $returnData The data that shoud be formatted to another type
     */
    public static function byValue($returnType, $returnData) {
        $returnType = strlen($returnType) > 0 ? $returnType : 'json';
        if (method_exists('Output', $returnType)) {
            call_user_func_array('Output::' . $returnType, array($returnData));
        }
        exit;
    }

    /**
     * 
     * Returns the Data by a certain header data (like the Accept Header)
     * @param String $header
     * @param variable $data
     * @return undefined
     */
    public static function byHeader($header, $data) {
        if (strpos($header, 'application/json') !== false) {
            return self::json($data);
        }
        return self::json($data);
    }

    /**
     * Shoud return an XML File
     * @param Value $returnData The Data that shoud be returned
     */
    public static function xml($returnData) {
        echo 'XML';
        exit;
        var_dump($returnData);
    }

    /**
     * Returns an json String
     * @param Variable $returnData
     */
    public static function json($returnData) {
        if (!is_array($returnData)) {
            $returnData = array($returnData);
        }
        exit(json_encode($returnData));
    }

}
