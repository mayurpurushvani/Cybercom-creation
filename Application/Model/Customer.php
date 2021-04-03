<?php

namespace Model;


class Customer extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;

    public function __construct()
    {
        $this->setTableName("customer");
        $this->setPrimaryKey("customerId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable"
        ];
    }
    public function getBillingAddress()
    {
        $query = "select * from `customer_address` where customerId = $this->customerId and addressType='billing'";
        $billingAddress = \Mage::getModel('Model\Customer\CustomerAddress')->fetchRowByQuery($query);
        if (!$billingAddress) {
            return false;
        }
        return $billingAddress;
    }

    public function getShippingAddress()
    {
        $query = "select * from `customer_address` where customerId = $this->customerId and addressType='shipping'";
        $shippingAddress = \Mage::getModel('Model\Customer\CustomerAddress')->fetchRowByQuery($query);
        if (!$shippingAddress) {
            return false;
        }
        return $shippingAddress;
    }
}
