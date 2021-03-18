<?php
namespace Block\Customer\Layout;

\mage::getBlock('Block\Core\Template');
class Footer extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Customer/Layout/Footer.php');
    }
}

?>