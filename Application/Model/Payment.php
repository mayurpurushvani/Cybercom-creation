<?php

namespace Model;
\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');


class Payment extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTableName("payment");
        $this->setPrimaryKey("methodId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED=>"Disable", //or use self::
            self::STATUS_ENABLE=>"Enable"
        ];
    }

}
