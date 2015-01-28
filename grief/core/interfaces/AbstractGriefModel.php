<?php

/**
 * GriefModels are designt to be singletons.
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
abstract class AbstractGriefModel {

    /**
     *
     * The extended child of this class
     * @var Object
     */
    private $child;

    /**
     * 
     * Sets the Child class of the contructed controller to this parent
     * @param Object $child
     */
    public function setChildObject($child) {
        $this->child = $child;
    }

}
