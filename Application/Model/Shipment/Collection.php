<?php

namespace Model\Shipment;

\Mage::loadFileByClassName('Model\Core\collection');

class Collection extends \Model\Core\Collection{
    
    public function __construct()
    {
        \Mage::getModel('Model\Core\Collection');
    }
}

?>