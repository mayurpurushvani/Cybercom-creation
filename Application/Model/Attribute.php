<?php

namespace Model;

class Attribute extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName("attribute");
        $this->setPrimaryKey("attributeId");
    }
    public function getInputTypeOption()
    {
        return [
            'text' => 'TextBox',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'select-multiple' => 'Select Multiple',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio'
        ];
    }
    public function getBackendTypeOption()
    {
        return [
            'varchar(256)' => 'Varchar',
            'int(11)' => 'Int',
            'decimal(10,2)' => 'Decimal',
            'text' => 'Text'
        ];
    }
    public function getEntityTypeOption()
    {
        return [
            'product' => 'Product',
            'category' => 'Category'
        ];
    }
    public function getOptions()
    {
        if (!$this->attributeId) {
            return false;
        }
        $attributeOption = \Mage::getModel('Model\Attribute\Option');
        $key = $this->getPrimaryKey();
        $query = "SELECT * FROM `{$attributeOption->getTableName()}` WHERE {$key} = '{$this->$key}'";
        $options = $attributeOption->fetchAll($query);
        return $options;
    }
}
