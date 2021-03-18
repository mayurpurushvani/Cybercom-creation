<?php

namespace Block\Admin\Payment;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $payments = null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/Payment/payment.php');   
    }
    public function setPayments($payments = null)
    {
        if($this->payments) {
            $this->payments = $payments;
        }
        if(!$payments) {
            $payments = \Mage::getModel('Model\Payment');
            $rows = $payments->fetchAll();
            $this->payments = $rows;
        }
        return $this;
    }
    public function getPayments()
    {
        if(!$this->payments) {
            $this->setPayments();
        }
        return $this->payments;
    }
}
?>