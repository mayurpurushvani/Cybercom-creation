<?php

namespace Block\Admin\Attribute;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $attributes = null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/attribute.php');   
    }
    public function setAttributes($attributes = null)
    {
        if($this->attributes) {
            $this->attributes = $attributes;
        }
        if(!$attributes) {
            $attributes = \Mage::getModel('Model\Attribute');
            $rows = $attributes->fetchAll();
            $this->attributes = $rows;
        }
        return $this;
    }
    public function getAttributes()
    {
        if(!$this->attributes) {
            $this->setAttributes();
        }
        return $this->attributes;
    }
}
?>