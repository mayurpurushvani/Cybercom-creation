<?php

namespace Block\Admin\CMS\Edit;
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
        $this->addTab('Form', ['label' => 'Form', 'block' => 'Block\Admin\CMS\Edit\Tabs\Form']);
        $this->setDefaultTab('Form');
        return $this;
    }
}

?>