<?php

namespace Model\Product;


class GroupPrice extends \Model\Core\Table
{
   
    public function __construct()
    {
        $this->setTableName("product_group_price");
        $this->setPrimaryKey("entityId");
    }
    
}
