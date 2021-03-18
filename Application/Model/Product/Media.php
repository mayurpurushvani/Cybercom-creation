<?php

namespace Model\Product;
\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');


class Media extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName("media");
        $this->setPrimaryKey("mediaId");
    }

}
