<?php

namespace Block\Admin\CMS;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $CMS = null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/CMS/CMS.php');   
    }
    public function setCMS($CMS = null)
    {
        if($this->CMS) {
            $this->CMS = $CMS;
        }
        if(!$CMS) {
            $CMS = \Mage::getModel('Model\CMS');
            $rows = $CMS->fetchAll();
            $this->CMS = $rows;
        }
        return $this;
    }
    public function getCMS()
    {
        if(!$this->CMS) {
            $this->setCMS();
        }
        return $this->CMS;
    }
}
?>