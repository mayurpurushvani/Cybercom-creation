<?php

namespace Model\Core;
class Url
{
    public function __construct()
    {
        $this->setRequest();   
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }
    public function getUrl($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false)
    {
        $final = $_GET;
        if ($resetParams) {
            $final = [];
        }
        if ($actionName == null) {
            $actionName = $_GET['a'];
        }
        if ($controllerName == null) {
            $controllerName = $_GET['c'];
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;

        if (is_array($params)) {
            $final = array_merge($final, $params);
        }
        $queryString = http_build_query($final);
        unset($final);
        $url = "http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/index.php?{$queryString}";
        return $url;
    }
    public function baseUrl($subUrl = null)
    {
        $url = "http://localhost/cybercom-creation/Advance%20PHP%20&%20MVC/Application/";
        if($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }
}
