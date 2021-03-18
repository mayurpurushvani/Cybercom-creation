<?php
namespace Model\Core;

class Request
{
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            return false;
        } else {
            return true;
        }
    }
    public function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            return true;
        } else {
            return false;
        }
    }
    public function getPost($key = Null, $value = Null)
    {
        if (!$key) {
            return $_POST;
        }
        if (!array_key_exists($key, $_POST)) {
            return $value;
        }
        return $_POST[$key];
    }

    public function getGet($key = Null, $value = Null)
    {
        if (!$key) {
            return $_GET;
        }
        if (!array_key_exists($key, $_GET)) {
            return $value;
        }
        return $_GET[$key];
    }
    public function getActionName()
    {
        return $this->getGet('a', 'index');
    }
    public function getControllerName()
    {
        return $this->getGet('c', 'dashboard');
    }
}
