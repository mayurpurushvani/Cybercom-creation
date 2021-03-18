<?php

namespace Block\Core\Layout;

\mage::getBlock('Block\Core\Template');
class Content extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Core/Layout/Content.php');
    }
}

?>