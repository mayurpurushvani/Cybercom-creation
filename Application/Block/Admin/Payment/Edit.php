<?php

namespace Block\Admin\Payment;

class Edit extends \Block\Core\Edit
{
    protected $payment = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs')); 
    }
}
