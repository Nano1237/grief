<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PostController extends AbstractGriefPostController {

    public function __construct() {
        $this->setRoutes(array(
            'user/:userId' => 'addCertainUser',
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
    public function addCertainUser($routParams) {
        return array(
            'id'=>$routParams['userId'],
            'name'=>RequestAnalyzer::getInput('name')
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
