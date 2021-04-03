<?php

namespace Model\Cart;

class Address extends \Model\Core\Table
{
    const ADDRESS_BILLING_ADDRESS = 'billing';
    const ADDRESS_SHIPPING_ADDRESS = 'shipping';

    protected $cart = null;
    protected $billingAddress = null;
    protected $shippingaddress = null;

    public function __construct()
    {
        $this->setTableName("cart_address");
        $this->setPrimaryKey("cartAddressId");
    }

    /**CART */
    public function getCart()
    {
        if (!$this->cartId) {
            return false;
        }
        $cartData = \Mage::getModel('Model\Cart')->fetchRow($this->cartId);
        $this->setCart($cartData);
        return $this->cart;
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }


    /**BILLING ADDRESS */
    public function setCustomerBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
    public function getCustomerBillingAddress()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * fROM `cart_address` WHERE cartId = '{$this->cartId}' AND `addressType` = '" . \Model\Cart\Address::ADDRESS_BILLING_ADDRESS . "'";
        $billingAddress = \Mage::getModel("Model\Cart\Address")->fetchRow($query);
        $this->setCustomerBillingAddress($billingAddress);
        return $this->billingAddress;
    }

    /**SHIPPING ADDRESS */
    public function setCustomerShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
    public function getCustomerShippingAddress()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * fROM `cart_address` WHERE cartId = '{$this->cartId}' AND `addressType` = '" . \Model\Cart\Address::ADDRESS_SHIPPING_ADDRESS . "'";
        $shippingAddress = \Mage::getModel("Model\Cart\Address")->fetchAll($query);
        $this->setCustomerShippingAddress($shippingAddress);
        return $this->shippingAddress;
    }
}
