<?php

namespace Block\Admin\Customer;

class Edit extends \Block\Core\Edit
{
    protected $customer = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
    }
}
