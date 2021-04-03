<?php

namespace Block\Admin\CustomerGroup;

class Edit extends \Block\Core\Edit
{
    protected $customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs'));
        
    }
}
