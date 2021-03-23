<?php
namespace Block\Core\Layout;

\mage::getBlock('Block\Core\Template');
class Header extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Core/Layout/header.php');
    }
    
}

?>