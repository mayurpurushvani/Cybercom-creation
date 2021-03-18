<?php

namespace Block\Admin\Dashboard;
\mage::getBlock('Block\Core\Template');

class Index extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Admin/Dashboard/dashboard.php');   
    }
}
?>