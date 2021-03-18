<?php
namespace Block\Customer\Layout;

\mage::getBlock('Block\Core\Template');
class Left extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Customer/Layout/Left.php');
    }
    
}

?>