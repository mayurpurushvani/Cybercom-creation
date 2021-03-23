<?php

namespace Block\Core;

\Mage::getBlock('Block\Core\Layout\Content');
\Mage::getBlock('Block\Core\Layout\Header');
\Mage::getBlock('Block\Core\Layout\Left');
\Mage::getBlock('Block\Core\Layout\Footer');
\Mage::getBlock('Block\Core\Template');

class Layout extends \Block\Core\Template
{
    public function __construct(\Controller\Core\Admin $controller = null)
    {
        //$this->setController($controller);
        $this->setTemplate("View/Core/Layout/oneColumn.php");
        // $this->prepareChildren();
    }
    // public function prepareChildren()
    // {
    //     $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
    //     $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header');
    //     $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
    //     $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer');
    // }
    public function getcontent()
    {
        return $this->getChild('content');
    }
    public function getHeader()
    {
        return $this->getChild('header');
    }
    public function getLeft()
    {
        return $this->getChild('left');
    }
}
