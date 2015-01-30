<?php

/**
 * This is a Demo Class, how you could use the AbstractGriefAuthHandler.
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class AuthHandler extends AbstractGriefAuthHandler {

    private static $isLoggedIn = true;

    /**
     * Used to check if the user is logged in
     * @return Boolean
     */
    protected static function isLoggedIn() {
        return self::$isLoggedIn;
    }

    /**
     * If the user is not logged in, this method will be called
     */
    protected static function noLoginCallback() {
        exit('Login Required!');
    }

    /**
     * 
     * Checks if the user has enough permission for the request.
     * You probably need to make a database connection or something like that.
     * The Return value will be passed to the 'needsAuth' method.
     * @param Array $requestData Your own Requestdata, that you will check
     * @return Boolean
     */
    protected static function requestAllowed($requestData = array()) {
        return is_array($requestData) && isset($requestData['auth']) && $requestData['auth'];
    }

    /**
     * Will be called if the user has not enough permission.
     * The Return value will be passed to the 'needsAuth' or 'needsPermission' method
     */
    protected static function requestNotAllowedCallback() {
        exit('Not enought permissions!');
    }

}
