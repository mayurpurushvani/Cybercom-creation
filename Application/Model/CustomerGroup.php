<?php
namespace Model;
\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');


class CustomerGroup extends \Model\Core\Table
{ 
    public function __construct()
    {
        $this->setTableName("customer_group");
        $this->setPrimaryKey("groupId");
    }
}
