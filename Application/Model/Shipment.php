<?php

namespace Model;

class Shipment extends \Model\Core\Table
{

    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;

    public function __construct()
    {
        $this->setTableName("shipment");
        $this->setPrimaryKey("methodId");
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable"
        ];
    }
    public function getShipmentMethods()
    {
        $query = "SELECT * FROM shipment WHERE STATUS=1";
        $shipmentMethods = \Mage::getModel('Model\Shipment')->fetchAll($query);
        return $shipmentMethods;
    }
}
