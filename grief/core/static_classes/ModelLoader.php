<?php

/**
 * This Class loads the models that are requested.
 * All models are singletons, that means every model that is initialized will be stored in the modelcache and will be returned if needed
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class ModelLoader {

    /**
     * Here are the initialized models cached
     * @var Array
     */
    private static $modelCache = array();

    /**
     * 
     * Loads a new model and initializes it (if the model and the file exists)
     * @param String $modelName The name of the model
     * @return \modelName The initialized model
     */
    private static function loadNewModel($modelName) {
        $glob = ConfigLoader::getGlobalConfig();
        $filename = CURRENT_ZONE_PATH . '/' . $glob['model_prefix'] . $modelName . '.php';
        if (file_exists($filename)) {
            require_once($filename);
            if (class_exists($modelName)) {
                $model = new $modelName();
                return $model;
            }
        } else {
            //Error, model not found!
        }
    }

    /**
     * 
     * Returns a cached Model (or loads a nwe obne if it is not initialized)
     * @param String $modelName The name of the requestet model
     * @return Object
     */
    public static function getModel($modelName) {
        if (!isset(self::$modelCache[$modelName])) {
            self::$modelCache[$modelName] = self::loadNewModel($modelName);
        }
        return self::$modelCache[$modelName];
    }

}
