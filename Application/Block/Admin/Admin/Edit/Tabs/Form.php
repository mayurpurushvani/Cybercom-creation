<?php

namespace Block\Admin\Admin\Edit\Tabs;

class Form extends \Block\Core\Template {
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Admin/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Admin Add/Edit';
    }
}

?>