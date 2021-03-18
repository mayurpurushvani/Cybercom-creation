<?php

namespace Model\Admin;
\Mage::loadFileByClassName('Model\Core\Session');

class Session extends \Model\Core\Session
{

    public function __construct()
    {
        $this->start();
        $this->setNameSpace('admin');
        $_SESSION[$this->getNameSpace()]['init'] = '';
    }

    public function setNameSpace($name)
    {
        $this->namespace = $name;
        return $this;
    }
    public function getNameSpace()
    {
        return $this->namespace;
    }

    public function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $this;
    }
    public function destroy()
    {
        session_destroy();
        return $this;
    }
    public function getId()
    {
        return session_id();
    }
    public function regenerateId()
    {
        return session_regenerate_id();
    }
    public function createId()
    {
        return session_create_id();
    }
    public function __set($key, $value)
    {
        $_SESSION[$this->getNameSpace()][$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if (!array_key_exists($key, $_SESSION[$this->getNameSpace()])) {
            return null;
        }
        return $_SESSION[$this->getNameSpace()][$key];
    }
    public function __unset($key)
    {
        if (array_key_exists($key, $_SESSION[$this->getNameSpace()])) {
            unset($_SESSION[$this->getNameSpace()][$key]);
        }
        return $this;
    }
}
