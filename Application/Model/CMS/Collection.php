<?php

namespace Model\CMS;

\Mage::loadFileByClassName('Model\Core\Collection');

class Collection extends \Model\Core\Collection {
    
    public function __construct()
    {
        \Mage::getModel('Model\Core\Collection');
    }
}

?>