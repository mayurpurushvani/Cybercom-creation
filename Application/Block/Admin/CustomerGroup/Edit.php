<?php

namespace Block\Admin\CustomerGroup;
\mage::getBlock('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    protected $customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs'));
        
    }
}
