<?php

namespace Block\Admin\Admin;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $admins = null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/Admin/admin.php');   
    }
    public function setAdmins($admins = null)
    {
        if($this->admins) {
            $this->admins = $admins;
        }
        if(!$admins) {
            $admins = \Mage::getModel('Model\Admin');
            $rows = $admins->fetchAll();
            $this->admins = $rows;
        }
        return $this;
    }
    public function getAdmins()
    {
        if(!$this->admins) {
            $this->setAdmins();
        }
        return $this->admins;
    }
}
?>