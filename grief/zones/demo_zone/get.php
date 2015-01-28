<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class GetController extends AbstractGriefGetController {

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
        $myModel = ModelLoader::getModel('DemoModel');
        return $myModel->testMethod(1, 5).$routParams['variableName'];
    }

}
