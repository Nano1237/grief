<?php

/**
 * The Output Class MUST be used (that means the return of the controller methiod will be formed to a json string for example)
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class Output {

    public static function byValue($value, $data) {
        $value = strlen($value) > 0 ? $value : 'json';
        if (method_exists('Output', $value)) {
            call_user_func_array('Output::' . $value, array($data));
        }
        exit;
    }

    public static function xml($data) {
        echo 'XML';
        exit;
    }

    public static function json($data) {
        if (!is_array($data)) {
            $data = array($data);
        }
        //json header set
        exit(json_encode($data));
    }

}
