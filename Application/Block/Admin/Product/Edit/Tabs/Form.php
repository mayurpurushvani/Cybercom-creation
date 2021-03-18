<?php

namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template {
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Product/Edit/Tabs/Form.php');
    }
    
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Product Add/Edit';
    }
}

?>