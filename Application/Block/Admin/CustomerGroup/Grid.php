<?php

namespace Block\Admin\CustomerGroup;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customerGroups = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/CustomerGroup/customerGroup.php');
    }
    public function setCustomerGroups($customerGroups = null)
    {
        if ($this->customerGroups) {
            $this->customerGroups = $customerGroups;
        }
        if (!$customerGroups) {
            $customerGroups = \Mage::getModel('Model\CustomerGroup');
            $rows = $customerGroups->fetchAll();
            $this->customerGroups = $rows;
        }
        return $this;
    }
    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroups();
        }
        return $this->customerGroups;
    }
}
