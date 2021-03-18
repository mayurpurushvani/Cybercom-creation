<?php

namespace Block\Core;

\mage::getBlock('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    // protected $admin = null;
    protected $tab = null;
    protected $tabClass = null;


    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Core/Edit.php');
    }


    public function getTabContent()
    {
        $tabBlock = $this->getTab();
        $tabs = $tabBlock->getTabs();

        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());

        if (!array_key_exists($tab, $tabs)) {
            return null;
            // $tab = $tabBlock->getDefaultTab();
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        $block->setTableRow($this->getTableRow());
        
        return $block->toHtml();
    }
    
    public function getFormUrl()
    {
        return $this->getUrl('save', null, null);
    }

    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;
        return $this;
    }

    public function getTabClass()
    {
        return $this->tabClass;
    }

    public function getTabHtml()
    {
        // print_r($this->getTab());die;
        return $this->getTab()->toHtml();
    }

    public function setTab($tab = null)
    {
        if (!$tab) {
            $tab = $this->getTabClass();
        }
        $this->setTableRow($this->getTableRow());
        $this->tab = $tab;
        return $this;
    }

    public function getTab()
    {
        if (!$this->tab) {
            $this->setTab();
        }
        return $this->tab;
    }
}
