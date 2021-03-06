<?php

/**
 * Defines usefull and maybe often used constants
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
$pathparts = PathAnalyzer::getPathParts();
define('CURRENT_ZONE_PATH', isset($pathparts[0]) ? (ZONE_PATH . '/' . $pathparts[0]) : false);
//
set_error_handler(array(ErrorHandler, 'error_handler'));

$getGlobalConfig = ConfigLoader::getGlobalConfig();
error_reporting(constant($getGlobalConfig['error_reporting']));
