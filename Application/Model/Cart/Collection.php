<?php

namespace Model\Cart;

class Collection extends \Model\Core\Collection {
    
    public function __construct()
    {
        \Mage::getModel('Model\Core\Collection');
    }
}

?>