<?php
namespace Block\Core\Layout;

\mage::getBlock('Block\Core\Template');
class Left extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Core/Layout/Left.php');
    }
    
}

?>