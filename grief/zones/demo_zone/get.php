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
            'user/:userId' => 'GetCertainUser',
            'fixName/:variableName' => 'anotherMethod'
        ));
    }
    
    
    public function GetCertainUser($param){
        return array(
            'name'=>'John Doe',
            'id'=>$param['userId']
        );
    }

    /**
     * mainRoute has to be defined (its abstract)
     * @param Array $routParams
     */
    public function mainRoute($routParams) {
        return array(
            array('fees'=>5),
            array('fees'=>7)
        );
        print_r($routParams);
    }

    public function myDemo($routParams) {
        return array('fees'=>4);
        echo 'someMethod';
        print_r($routParams);
    }

    public function anotherMethod($routParams) {
        $myModel = ModelLoader::getModel('DemoModel');
        return $myModel->testMethod(1, 5) . $routParams['variableName'];
    }

}
