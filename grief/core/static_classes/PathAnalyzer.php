<?php

/**
 * Analyzes the path the user enters (or the application calls)
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class PathAnalyzer {

    static private $path;

    /**
     * Returns an array with the user set path
     * @return array
     */
    static private function analyzeRequestPath() {
        $glob = ConfigLoader::getGlobalConfig();
        //this coud also be done without regex, but im too lazy at the moment
        $reg = '/^' . preg_quote($glob['base_domain'], '/') . '/';
        $realPath = preg_replace($reg, '', $_SERVER['REQUEST_URI']); //get the real path
        return explode('/', preg_replace('/\?.*/', '', $realPath)); //remove GET Parameters and split by /
    }

    /**
     * 
     * Looks for one possible method that is called
     * @param Array $zonePathes
     * @return Array
     */
    static public function analyzePath($zonePathes) {
        $reg = '/^\:/';
        $userPathCount = (count(self::$path) - 1);
        foreach ($zonePathes as $zonePath => $MethodName) {
            $explodedZone = explode('/', $zonePath);
            //if the user path has the same amount of parts as the current Zone-Path
            if (count($explodedZone) === $userPathCount) {
                $cache = array();
                foreach ($explodedZone as $index => $value) {
                    if (preg_match($reg, $value)) {//is a path variable
                        $cache[preg_replace($reg, '', $value)] = self::$path[$index + 1];
                    } elseif ($value !== self::$path[$index + 1]) {
                        break;
                    }
                    if ($index + 1 === $userPathCount) {//This must be the correct path!
                        return array($MethodName, $cache);
                    }
                }
            }
        }
        return array();
    }

    /**
     * Returns the cached analyzed path or, starts the cache method
     * @return array
     */
    static public function getPathParts() {
        if (isset(self::$path)) {
            self::$path = self::analyzeRequestPath();
        }
        return self::$path;
    }

}
