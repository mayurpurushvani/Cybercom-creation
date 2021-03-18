<?php

namespace Block\Admin\Attribute\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    public function prepareTab()
    {
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        if ($id = $this->getRequest()->getGet('editId')) {
            $attribute = \Mage::getModel('Model\Attribute');
            $attribute->fetchRow($id);
            if ($attribute->inputType != 'text' && $attribute->inputType != 'textarea') {
                $this->addTab('Options', ['label' => 'Options', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
            }
        }
        $this->setDefaultTab('Form');
        return $this;
    }
}
