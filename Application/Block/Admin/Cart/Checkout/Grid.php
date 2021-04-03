<?php

namespace Block\Admin\Cart\Checkout;

class Grid extends \Block\Core\Template
{

    protected $cart = null;

    public function __construct()
    {

        $this->setTemplate('View/Admin/Cart/Checkout/Grid.php');
    }

    public function getId()
    {
        $id = $this->getRequest()->getGet('id');
        return $id;
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function getCart()
    {
        if (!$this->cart) {
            $cart = \Mage::getModel('Model\Cart');
            $this->setCart($cart);
        }
        return $this->cart;
    }
    public function getCustomers()
    {
        $query = "SELECT customerId,firstName from customer";
        $customer = \Mage::getModel('Model\Customer')->fetchAll($query);
        return $customer;
    }

    public function getBillingAddress()
    {
        $cartBillingAddress = $this->getCart()->getBillingAddress();

        if ($cartBillingAddress) {
            return $cartBillingAddress;
        }
        return $this->getCart()->getCustomer()->getBillingAddress();
    }
    public function getShippingAddress()
    {
        $cartShippingAddress = $this->getCart()->getShippingAddress();

        if ($cartShippingAddress) {
            return $cartShippingAddress;
        }
        return $this->getCart()->getCustomer()->getShippingAddress();
    }
    public function getPaymentMethods()
    {
        return $this->getCart()->getPayment()->getPaymentMethods();
    }
    public function getShipmentMethods()
    {
        return $this->getCart()->getShipment()->getShipmentMethods();
    }
}
