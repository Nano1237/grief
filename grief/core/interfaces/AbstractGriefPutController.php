<?php

/**
 * Description
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
abstract class AbstractGriefPutController {

    /**
     *
     * The extended child of this class
     * @var Object
     */
    private $child;

    /**
     *
     * 
     * @var array 
     */
    private $routes = array();

    /**
     *
     * The user sets routes.
     * The bootstrapper looks for the routes
     */
    protected function setRoutes($routeArray) {
        $this->routes = $routeArray;
    }

    /**
     * This Method will be called, if no route parameter is set for the api call.
     * For example the user accesses the url : "localhost/myWWW/demo_zone/" this will call the main route.
     * Another exampe is the call of "localhost/myWWW/demo_zone/something" if the something method is not set
     */
    abstract public function mainRoute($routParams);

    /**
     * 
     * Sets the Child class of the contructed controller to this parent
     * @param Object $child
     */
    public function setChildObject($child) {
        $this->child = $child;
    }

    /**
     * 
     * Returns the protected routes array
     * @return array
     */
    public function getRoutes() {
        return $this->routes;
    }

}
