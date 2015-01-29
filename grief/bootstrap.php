<?php

/**
 * 
 * This script start the whole project
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
define('ROOT_PATH', realpath(__DIR__ . '/..'));
define('GRIEF_PATH', realpath(ROOT_PATH . '/grief/'));
define('CORE_PATH', realpath(GRIEF_PATH . '/core'));
define('ZONE_PATH', realpath(GRIEF_PATH . '/zones'));
//load the always used static_classes and constants
require_once(CORE_PATH . '/static_classes/ConfigLoader.php');
require_once(CORE_PATH . '/static_classes/PathAnalyzer.php');
require_once(CORE_PATH . '/constants.php');

require_once(CORE_PATH . '/static_classes/Output.php');
require_once(CORE_PATH . '/static_classes/ModelLoader.php');
require_once(CORE_PATH . '/static_classes/RequestAnalyzer.php');
//require_once(CORE_PATH . '/static_classes/RequestInput.php');


require_once(CORE_PATH . '/GriefControllerParent.php');

//@todo: load all interfaces (order doesnt matters)
require_once(CORE_PATH . '/interfaces/AbstractGriefModel.php');


if (RequestAnalyzer::getMethodLower() === 'options') {
    exit('options');
}
if (!CURRENT_ZONE_PATH) {
    exit('No zone set!');
}

//start the whole thing
require_once(CORE_PATH . '/ControllerInitializer.php');
new ControllerInitializer();


//everything that happens after the ControllerInitializer is an error
//because the output Class Exits the script normaly
exit('unexpected error!');
