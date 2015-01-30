<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class GetController extends AbstractGriefGetController {

    /**
     * You define the possible Routes in the contructor.
     * 
     */
    public function __construct() {
        $this->setRoutes(array(
            'user' => 'getAllUsers',
            'user/:userId' => 'getCertainUser',
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
     * A method that demonstrates the GET-Request without variables.
     * It also demonstrates the usage of models
     * @return array
     */
    public function getAllUsers() {
        return ModelLoader::getModel('UserData')->getMultipleUsers(array(
                    1, 2, 3
        ));
    }

    /**
     * 
     * A method that demonstrates the a Get-Controller Method with variables.
     * It also demonstrates the usage of models
     * @param type $param
     * @return type
     */
    public function getCertainUser($param) {
        return ModelLoader::getModel('UserData')->getUser($param['userId']);
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
