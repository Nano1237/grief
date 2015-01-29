<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class PutController extends AbstractGriefPutController {

    /**
     * You define the possible Routes in the contructor.
     * 
     */
    public function __construct() {
        $this->setRoutes(array(
            'user/:userId' => 'updateCertainUser',
            'fixName/:variableName' => 'anotherMethod'
        ));
    }

    /**
     * mainRoute has to be defined (its abstract).
     * It is called if no route matches.
     * @param Array $routeParams
     */
    public function mainRoute($routeParams) {
        echo 'mainRoute';
        print_r($routeParams);
        exit;
    }

    /**
     * 
     * A Demo Put Method that demonstrates the usage of the RequestAnalyzer::getInput Method
     * @param Array $routeParams
     */
    public function updateCertainUser($routeParams) {
        //Normally you want to return something, that the Output class can handle it.
        //We exit for demonstration to see a string in the javaScript Console
        exit('User: ' . $routeParams['userId'] . ' new Name: ' . RequestAnalyzer::getInput('name'));
    }

    /**
     * Just another Method to demonstrate, how you can add multiple routes in the contrcutor
     * @param Array $routeParams
     */
    public function anotherMethod($routeParams) {
        echo 'anotherMethod';
        print_r($routeParams);
    }

}
