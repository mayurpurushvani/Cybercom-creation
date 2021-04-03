<?php

namespace Block\Admin\Attribute\Edit\Tabs;


class Form extends \Block\Core\Template {
    
    protected $attribute = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Attribute/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Attribute Add/Edit';
    }
}

?>