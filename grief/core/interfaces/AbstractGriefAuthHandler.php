<?php

/**
 * The Parent for the AuthHandler
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
abstract class AbstractGriefAuthHandler {

    /**
     * Checks if the user is logged in
     */
    abstract static protected function isLoggedIn();

    /**
     * Returns if the user has enought permisssion for the request
     * @param null|variable $permissionData The Data needed for the permission check
     */
    abstract static protected function requestAllowed($permissionData = null);

    /**
     * Is called if the user is not logged in passed by static::isLoggedIn
     */
    abstract static protected function noLoginCallback();

    /**
     * Is called if the request is not allowed passed by static::requestAllowed
     */
    abstract static protected function requestNotAllowedCallback();

    /**
     * 
     * Checks if the user is logged in and (if $permissionData isset) if the user has enought permission
     * @param array|null $permissionData
     * @return boolean
     */
    public static function needsAuth($permissionData = null) {
        if (!static::isLoggedIn()) {
            return static::noLoginCallback();
        }
        if ($permissionData !== null) {
            return self::needsPermission($permissionData);
        }
        return true;
    }

    /**
     * 
     * Checks (passes the permissiondata to the requestAllowed Method) if the request permission is enough
     * @param array|null $permissionData
     * @return boolean
     */
    public static function needsPermission($permissionData = null) {
        if (!static::requestAllowed($permissionData)) {
            return static::requestNotAllowedCallback();
        }
        return true;
    }

}
