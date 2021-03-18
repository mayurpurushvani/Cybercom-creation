<?php

namespace Block\Admin\Customer\Edit;

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
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Customer\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('editId')) {
            $this->addTab('customerAddress', ['label' => 'Customer Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\CustomerAddress']);
        }
        $this->setDefaultTab('Form');
        return $this;
    }
}
