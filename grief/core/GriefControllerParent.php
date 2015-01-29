<?php

/**
 * The Parent of all Cotnrollers
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class GriefControllerParent {

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
        $this->routes = PathAnalyzer::analyzePath($routeArray);
        if (count($this->routes) === 0) {
            $this->routes = array('mainRoute',array());//set the default method without params
        }
    }

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
    public function getAnalyzedPath() {
        return $this->routes;
    }

}
