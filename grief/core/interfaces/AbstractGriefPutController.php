<?php

/**
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
abstract class AbstractGriefPutController extends GriefControllerParent {

    /**
     * This Method will be called, if no route parameter is set for the api call.
     * For example the user accesses the url : "localhost/myWWW/demo_zone/" this will call the main route.
     * Another exampe is the call of "localhost/myWWW/demo_zone/something" if the something method is not set
     */
    abstract public function mainRoute($routParams);
}
