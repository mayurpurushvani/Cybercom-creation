<?php

namespace Block\Admin\Attribute\Edit\Tabs;

class Option extends \Block\Core\Template {
    
    protected $attribute = null;
    
   
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Attribute/Edit/Tabs/Option.php');
    }
    public function setAttribute($attribute = null)
    {
        if ($this->attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = \Mage::getModel('Model\Attribute');
        $id = $this->getTableRow()->attributeId;
        if ($id) {
            $attribute = $attribute->fetchRow($id);
        }
        $this->attribute = $attribute;
        return $this;
    }
    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
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