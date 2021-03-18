<?php

namespace Model\Product;
\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');


class GroupPrice extends \Model\Core\Table
{
   
    public function __construct()
    {
        $this->setTableName("product_group_price");
        $this->setPrimaryKey("entityId");
    }
    
}
