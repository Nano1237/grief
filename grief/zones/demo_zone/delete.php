<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class Controller extends AbstractGriefDeleteController {

    public function __construct() {
        $this->setRoutes(array(
            ':variableName/fixName/AnotherFix' => 'someMethod',
            'fixName/:variableName' => 'anotherMethod'
        ));
    }

    /**
     * mainRoute has to be defined (its abstract)
     * @param Array $routParams
     */
    public function mainRoute($routParams) {
        echo 'mainRoute';
        print_r($routParams);
    }

    public function someMethod($routParams) {
        echo 'someMethod';
        print_r($routParams);
    }

    public function anotherMethod($routParams) {
        echo 'anotherMethod';
        print_r($routParams);
    }

}
