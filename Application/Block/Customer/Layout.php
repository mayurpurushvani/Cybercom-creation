<?php

namespace Block\Customer;

class Layout extends \Block\Core\Layout
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Customer/Layout.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Footer'), 'footer');
    }
}