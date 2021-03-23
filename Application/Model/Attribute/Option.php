<?php

namespace Model\Attribute;

\mage::getModel('Model\Core\Adapter');
\mage::getModel('Model\Core\Table');

class Option extends \Model\Core\Table
{
    protected $attribute = null;

    public function __construct()
    {
        $this->setTableName("attribute_option");
        $this->setPrimaryKey("optionId");
    }
    // public function setAttribute($attribute)
    // {
    //     $attribute =     ;
    // }
    // public function getAttribute()
    // {
        
    // }
}
