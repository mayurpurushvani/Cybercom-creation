<?php

namespace Block\Admin\Product\Edit;

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
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('editId')) {
            $this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
            $this->addTab('Group Price', ['label' => 'Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
            $this->addTab('Attribute', ['label' => 'Attribute', 'block' => 'Block\Admin\Product\Edit\Tabs\Attribute']);
        }
        $this->setDefaultTab('Form');
        return $this;
    }
}
