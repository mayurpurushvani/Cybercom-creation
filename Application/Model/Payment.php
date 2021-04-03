<?php

namespace Model;


class Payment extends \Model\Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTableName("payment");
        $this->setPrimaryKey("methodId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable"
        ];
    }

    public function getPaymentMethods()
    {
        $query = "SELECT * FROM payment WHERE STATUS = 1";
        $paymentMethods = \Mage::getModel('Model\Payment')->fetchAll($query);
        return $paymentMethods;
    }
}
