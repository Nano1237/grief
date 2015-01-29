<?php

/**
 * This Class loads the correct Controller (if found) or returns an error
 * @author Tim Rücker <tim.ruecker@ymail.com>
 * @copyright (c) 2015
 * 
 */
class ControllerInitializer {

    /**
     * @todo clean this method!!
     */
    public function __construct() {
        $controller = $this->getCurrentController();
        if ($controller) {
            list($methodName, $params) = $controller->getAnalyzedPath();
            if (method_exists($controller, $methodName)) {
                $return = $controller->{$methodName}($params);
            } else {
                $return = $controller->mainRoute($params);
            }
            Output::byValue($_GET['return_type'], $return);
        }
    }

    /**
     * Returns (if found) the controller that is used for the request
     * @return \controllerName|boolean
     */
    private function getCurrentController() {
        //Check for globaly wrong requests
        $allow = RequestMethod::requestAllowed();
        $gc = ConfigLoader::getGlobalConfig();
        if (!$allow && !$gc['ressource_options_default']) {
            exit('Request permittet');
        } elseif (!$allow) {
            $lowerMethod = 'default';
        } else {
            $lowerMethod = RequestMethod::getMethodLower();
        }
        $controllerFile = CURRENT_ZONE_PATH . '/' . $lowerMethod . '.php';
        if (file_exists($controllerFile)) {
            $controllerName = ucfirst($lowerMethod) . 'Controller';
            require_once(CORE_PATH . '/interfaces/AbstractGrief' . $controllerName . '.php');
            require_once($controllerFile);
            if (class_exists($controllerName)) {
                $newController = new $controllerName();
                $newController->setChildObject($newController);
                return $newController;
            }
        }
        return false;
    }

}
