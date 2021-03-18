<?php

namespace Block\Customer\Home;

\mage::getBlock('Block\Core\Template');

class Index extends \Block\Core\Template
{
    protected $admins = null;
    public function __construct()
    {
        $this->setTemplate('View/Customer/Home/index.php');
    }
}
