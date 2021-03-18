<?php

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{

    protected $customer = null;
    protected $groupOptions = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/Form.php');
    }
    public function setCustomer($customer = null)
    {
        if ($this->customer) {
            $this->customer = $customer;
            return $this;
        }
        $customer = \Mage::getModel('Model\Customer');
        $id = $this->getTableRow()->customerId;
        if ($id) {
            $customer = $customer->fetchRow($id);
        }
        $this->customer = $customer;
        return $this;
    }
    public function getGroupOptions()
    {
        if (!$this->groupOptions) {
            $query = "SELECT `groupId`,`name` from `customer_group`";
            $this->groupOptions = $this->getCustomer()->getAdapter()->fetchPairs($query);
        }
        return $this->groupOptions;
    }

    public function getCustomer()
    {
        if (!$this->customer) {
            $this->setCustomer();
        }
        return $this->customer;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Customer Add/Edit';
    }
}
