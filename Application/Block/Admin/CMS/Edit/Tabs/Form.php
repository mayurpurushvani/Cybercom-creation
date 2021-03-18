<?php

namespace Block\Admin\CMS\Edit\Tabs; 
\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template {
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/CMS/Edit/Tabs/Form.php');
    }
  
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'CMS Add/Edit';
    }
}

?>