<?php

namespace Block\Admin\Category\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab(); 
    }
    public function prepareTab()
    {
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('Images', ['label' => 'Images', 'block' => 'Block\Admin\Category\Edit\Tabs\Images']);
        $this->addTab('Products', ['label' => 'Products', 'block' => 'Block\Admin\Category\Edit\Tabs\products']);
        $this->addTab('Attribute', ['label' => 'Attribute', 'block' => 'Block\Admin\Category\Edit\Tabs\Attribute']);

        $this->setDefaultTab('Form');
        return $this;
    }
}

?>