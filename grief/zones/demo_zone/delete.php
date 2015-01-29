<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class DeleteController extends AbstractGriefDeleteController {

    public function __construct() {
        $this->setRoutes(array(
            'user/:userId' => 'deleteCertainUser',
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
     * A Demo method to demonstrate the Delete Controller Method
     * @param type $routParams
     * @return type
     */
    public function deleteCertainUser($routParams) {
        return array(
            'success' => true,
            'message' => 'User ' . $routParams['userId'] . ' deleted'
        );
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
