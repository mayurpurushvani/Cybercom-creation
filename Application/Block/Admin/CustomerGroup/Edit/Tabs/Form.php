<?php

namespace Block\Admin\CustomerGroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template {
    
    protected $customerGroup = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/CustomerGroup/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Customer Group Add/Edit';
    }
}

?>