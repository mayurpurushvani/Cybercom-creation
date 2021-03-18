<?php

namespace Block\Admin\Shipment;
\mage::getBlock('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Shipment\Edit\Tabs'));
    }
}
