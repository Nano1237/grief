<?php

/**
 * One controller per zone allowed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class PutController extends AbstractGriefPutController {

    public function __construct() {
        $this->setRoutes(array(
            'user/:userId' => 'updateCertainUser',
            'demoType/:typeId' => 'myDemo',
            'fixName/:variableName' => 'anotherMethod'
        ));
    }

#

    public function updateCertainUser($params) {
        print_r(RequestInput::input());
        exit;
        echo 'User: ' . $params['userId'] . ' new Name: ';
        exit;
    }

    /**
     * mainRoute has to be defined (its abstract)
     * @param Array $routParams
     */
    public function mainRoute($routParams) {
        echo 'mainRoute';
        print_r($routParams);
    }

    public function myDemo($routParams) {
        return array('id' => $routParams['typeId'], 'message' => 'put done!');
//        print_r($routParams);
    }

    public function anotherMethod($routParams) {
        echo 'anotherMethod';
        print_r($routParams);
    }

}
