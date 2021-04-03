<?php

namespace Block\Admin\CustomerGroup\Edit;

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
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\CustomerGroup\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}
