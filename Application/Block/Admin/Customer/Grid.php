<?php

namespace Block\Admin\Customer;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $customers = null;
    protected $address = null;
    protected $customerGroups = null;
    protected $customersOptions = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/customer.php');
    }
    public function setCustomers($customers = null)
    {
        if ($this->customers) {
            $this->customers = $customers;
        }
        if (!$customers) {
            
            $customers = \Mage::getModel('Model\Customer');
            $query = "SELECT c.`customerId`,
                            c.`firstName`,
                            c.`lastName`,
                            c.`email`,
                            c.`mobile`,
                            c.`password`,
                            c.`status`,
                            c.`createdDate`,
                            c. `updatedDate`,
                            cg.`name` FROM 
                            `customer` AS c, `customer_group` AS cg
                            WHERE c.`groupId` = cg.`groupId` ORDER BY c.`customerId`;";
            
            $rows = $customers->fetchAll($query);
            $this->customers = $rows;
        }
        return $this;
    }
    public function getCustomers()
    {
        if (!$this->customers) {
            $this->setCustomers();
        }
        return $this->customers;
    }
    public function getZipCode()
    {
        $customers = \Mage::getModel('Model\Customer\CustomerAddress');
        $query = "SELECT c.`customerId`,
                        ca.addressType,
                        ca.zipCode
                        FROM 
                        `customer` AS c, `customer_address` AS ca
                        WHERE c.`customerId` = ca.`customerId` AND ca.`addressType` LIKE '%billing' ORDER BY c.`customerId`;";
        $rows = $customers->fetchAll($query);
       
        $this->customers = $rows;
    }
    public function getCustomerOptions()
    {
        if ($this->customersOptions) {
            return $this->customersOptions;
        }
        $query = "SELECT `groupId`, `name` from customer_group;";
        $customers = \Mage::getModel('Model\customer')->fetchAll($query);
        if ($customers) {
            foreach ($customers->getdata() as $customer) {
                $this->customersOptions[$customer->groupId] = $customer->name;
            }
        }
        return $this->customersOptions;
    }
}
