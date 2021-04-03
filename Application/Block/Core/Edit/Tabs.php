<?php

namespace Block\Core\Edit;

class Tabs extends \Block\Core\Template
{
    protected $tableRow = null;

    public function __construct()
    {
        $this->setTemplate('View/Core/Edit/Tabs.php');  
        $this->prepareTabs(); 
    }
    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        // if (!$this->tableRow) {
        //     $this->setTableRow(\Mage::getModel('Model\Core\Table'));
        // }
        return $this->tableRow;
    }
    public function prepareTabs()
    {
        return $this;
    }

   
}