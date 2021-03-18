<?php

namespace Block\Admin\Product\Edit\Tabs;

use Mage;

\Mage::loadFileByClassName('Block\Core\Template');
class Attribute extends \Block\Core\Template
{

    protected $attribute = null;
    protected $options = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Product/Edit/Tabs/Attribute.php');
    }

    public function getAttributes()
    {
        $sql = "SELECT * FROM `attribute` WHERE entityTypeId = 'product'";
        $attribute = \Mage::getModel('Model\Attribute');
        return $attribute->fetchAll($sql);
    }
   
    public function setAttribute($attribute = null)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = \Mage::getModel('Model\Attribute');
        $id = $this->getTableRow()->productId;
        $query = "SELECT * fROM `product` WHERE productId = '$id' ";
        $attribute1 = $attribute->fetchRowByQuery($query);
        $this->attribute = $attribute1;
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
