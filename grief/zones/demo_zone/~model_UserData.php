<?php

/**
 * A Demo model
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class UserData extends AbstractGriefModel {

    private $col_names = array();
    private $users = array();

    /**
     * Loads the demo data
     */
    public function __construct() {
        $f = file(ZONE_PATH . '/demo_zone/demo_data/FakeNameGenerator.csv');
        $this->col_names = explode(',', array_shift($f));
        $this->users = $f;
    }

    /**
     * 
     * Returns a list of user.
     * @param array $ids the ids as array
     * @return array
     */
    public function getMultipleUsers($ids = array()) {
        $return = array();
        foreach ($ids as $value) {
            array_push($return, $this->getUser($value));
        }
        return $return;
    }

    /**
     * 
     * Returns one user of the cached CSV
     * @param Int $id the rownumber (withoud header)
     * @return Array
     */
    public function getUser($id = 1) {
        $return = array();
        $x = explode(',', $this->users[$id]);
        foreach ($x as $key => $value) {
            $return[trim($this->col_names[$key])] = trim($value);
        }
        $return['id'] = $id;
        return $return;
    }

}
