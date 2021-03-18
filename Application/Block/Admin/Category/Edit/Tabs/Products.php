<?php

namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
class Products extends \Block\Core\Template {
    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/Edit/Tabs/Products.php');   
    }
}

?>