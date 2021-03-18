<?php

namespace Block\Customer;

\Mage::loadFileByClassName('Block\Core\Layout');

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
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer');
    }
}