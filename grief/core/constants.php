<?php

/**
 * Defines usefull and maybe often used constants
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
$pathparts = PathAnalyzer::getPathParts();
define('CURRENT_ZONE_PATH', isset($pathparts[0]) ? (ZONE_PATH . '/' . $pathparts[0]) : false);
