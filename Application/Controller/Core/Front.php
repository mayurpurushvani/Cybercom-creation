<?php

namespace Controller\Core;

class Front
{
    public static function init()
    {
        $request = \Mage::getModel('Model\Core\Request');
        $controllerName = ucfirst($request->getControllerName());
        $actionName = $request->getActionName()."Action";
        $controllerName = self::prepareClassName($controllerName, "controller");
        // $class = "Controller_{$controllerName}";
        // $controller = new $class();
        $controller = \Mage::getController($controllerName);
        $controller->$actionName();
    }
    public static function prepareClassName($key, $namespace)
    {
        $className = $namespace . " " . $key;
        $className = str_replace("\\", " ", $className);
        $className = ucwords($className);
        $className = str_replace(" ", " ", $className);
        return $className;
    }
}
