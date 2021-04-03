<?php

namespace Model\Admin;

class Filter extends \Model\Admin\Session
{

    protected $filters = [];

    // public function __construct()
    // {
    //     parent::__construct();   
    // }

    public function setFilters($filter)
    {
        $this->start();
        $this->setNameSpace('filter');
        foreach ($filter as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    public function getFilters($key)
    {
        if (!array_key_exists($key, $_SESSION)) {
            return null;
        }
        return $_SESSION[$key];
    }
}
