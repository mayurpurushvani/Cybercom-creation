<?php

namespace Block\Admin\Order;

class Grid extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Admin/Order/Grid.php');
    }
    public function getOrderItemDetails()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $orderId = $session->orderId;

        $query = "select p.name,oi.* from product p join order_item oi on p.productId=oi.productId where oi.orderId=$orderId";
    
        $orderItem = \Mage::getModel('Model\Order\OrderItem');
        $data = $orderItem->fetchAll($query);
        return $data;
    }

    public function getOrderDetails()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $orderId = $session->orderId;
        $order = \Mage::getModel('Model\Order');
        $query = "select s.name,o.* from shipment s join `order` o on s.methodId = o.shipmentMethodId where o.orderId = $orderId";

        return $order->fetchRowByQuery($query);
    }

    public function getCustomer()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $customerId = $session->customerId;
        $customer = \Mage::getModel('Model\Customer');
        $query = "Select firstName from customer where customerId = $customerId";

        $customerName = $customer->fetchRowByQuery($query);
        return $customerName;
    }
}
