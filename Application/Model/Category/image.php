<?php

namespace Model\Category;

\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');


class Image extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTableName("category_image");
        $this->setPrimaryKey("imageId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable"
        ];
    }
}
