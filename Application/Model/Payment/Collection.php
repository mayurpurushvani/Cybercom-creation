<?php

namespace Model\Payment;
class Collection extends \Model\Core\Collection {
    
    public function __construct()
    {
        \Mage::getModel('Model\Core\Collection');
    }
}

?>