<?php
namespace Model\Customer;

class CustomerAddress extends \Model\Core\Table
{
    const BILLING = 1;
    const SHIPING = 0;

    public function __construct()
    {
        $this->setTableName("customer_address");
        $this->setPrimaryKey("addressId");
    }
    public function getAddressTypeOptions()
    {
        return [
            self::BILLING => "Billing Address", //or use self::
            self::SHIPING => "Shiping Address"
        ];
    }
}
