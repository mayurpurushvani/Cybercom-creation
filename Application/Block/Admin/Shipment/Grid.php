<?php

namespace Block\Admin\Shipment;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $shipments = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Shipment/shipment.php');   
    }
    public function setShipments($shipments = null)
    {
        if($this->shipments) {
            $this->shipments = $shipments;
        }
        if(!$shipments) {
            $shipment = \Mage::getModel('Model\Shipment');
            $rows = $shipment->fetchAll();
            $this->shipments = $rows;
        }
        return $this;
    }
    public function getShipments()
    {
        if(!$this->shipments) {
            $this->setshipments();
        }
        return $this->shipments;
    }
}
?>