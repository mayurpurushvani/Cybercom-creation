<?php

namespace Block\Admin\Shipment\Edit;
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
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Shipment\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}

?>