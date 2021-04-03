<?php

namespace Controller\Core;

class Abstracts
{
    protected $request = null;
    protected $layout = null;
    protected $session = null;

    public function __construct()
    {
        $this->setRequest();
    }
    public function getLayout()
    {
        return $this->layout;
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
    public function renderLayout()
    {
        echo $this->getLayout()->toHtml();
    }
    public function redirect($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false)
    {
        $url = $this->getUrl($actionName, $controllerName, $params, $resetParams);
        header("Location: {$url}");
        exit(0);
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getUrl($actionName = Null, $controllerName = Null, $params = Null, $resetParams = false)
    {
        $final = $_GET;
        if ($resetParams) {
            $final = [];
        }
        if ($actionName == Null) {
            $actionName = $_GET['a'];
        }
        if ($controllerName == Null) {
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
}
