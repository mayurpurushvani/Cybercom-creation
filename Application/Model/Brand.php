<?php

namespace Model;
\mage::getModel('Model\Core\Table');


class Brand extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTableName("brand");
        $this->setPrimaryKey("brandId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED=>"Disable", //or use self::
            self::STATUS_ENABLE=>"Enable"
        ];
    }
}
