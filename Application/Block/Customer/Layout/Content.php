<?php

namespace Block\Customer\Layout;

\mage::getBlock('Block\Core\Template');
class Content extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Customer/Layout/Content.php');
    }
}

?>