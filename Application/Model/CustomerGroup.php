<?php
namespace Model;

class CustomerGroup extends \Model\Core\Table
{ 
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    
    public function __construct()
    {
        $this->setTableName("customer_group");
        $this->setPrimaryKey("groupId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable"
        ];
    }
}
