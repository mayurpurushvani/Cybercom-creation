<?php

namespace Model;

use Mage;

class Cart extends \Model\Core\Table
{
    protected $customer = null;
    protected $cartId = null;
    protected $billingAddress = null;
    protected $shippingAddress = null;
    protected $payment = null;
    protected $shipment = null;
    protected $items = [];
    protected $products = [];

    public function __construct()
    {
        $this->setTableName("cart");
        $this->setPrimaryKey("cartId");
        $session = \Mage::getModel('Model\Admin\Session');
        
        $this->cartId = $session->cartId;
        $this->customerId = $session->customerId;
    }

    public function setIds()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $this->cartId = $session->cartId;
        $this->customerId = $session->customerId;
    }
    /**CUSTOMER */
    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }
    public function getCustomer()
    {
        if ($this->customer) {
            return $this->customer;
        }
        if (!$this->customerId) {
            return false;
        }
        $customer = \Mage::getModel("Model\Customer")->fetchRow($this->customerId);
        $this->setCustomer($customer);
        return $this->customer;
    }

    /**CART ITEMS */
    public function setItems(\Model\Cart\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }
    public function getItems()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * fROM `cart_item` WHERE cartId = '{$this->cartId}'";
        $items = \Mage::getModel("Model\Cart\Item")->fetchAll($query);
        if (!$items) {
            return null;
        }
        $this->setItems($items);
        return $this->items;
    }


    /**BILLING ADDRESS */
    public function setBillingAddress(\Model\Cart\Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }
    public function getBillingAddress()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * fROM `cart_address` WHERE cartId = '{$this->cartId}' AND `addressType` = '" . \Model\Cart\Address::ADDRESS_BILLING_ADDRESS . "'";
        $billingAddress = \Mage::getModel("Model\Cart\Address")->fetchRowByQuery($query);
        if (!$billingAddress) {
            return null;
        }
        $this->setBillingAddress($billingAddress);
        return $this->billingAddress;
    }


    /**SHIPPING ADDRESS */
    public function setShippingAddress(\Model\Cart\Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
    public function getShippingAddress()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * fROM `cart_address` WHERE cartId = '{$this->cartId}' AND `addressType` = '" . \Model\Cart\Address::ADDRESS_SHIPPING_ADDRESS . "'";
        $shippingAddress = \Mage::getModel("Model\Cart\Address")->fetchRowByQuery($query);
        if (!$shippingAddress) {
            return null;
        }
        $this->setshippingAddress($shippingAddress);
        return $this->shippingAddress;
    }

    /**PAYMET METHOD */
    public function setPayment(\Model\Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }
    public function getPayment()
    {
        if ($this->payment) {
            return $this->payment;
        }
        if (!$this->cartId) {
            return false;
        }
        $payment = \Mage::getModel("Model\Payment");
        $this->setPayment($payment);
        return $this->payment;
    }

    /**SHIPMET METHOD */
    public function setShipment(\Model\Shipment $shipment)
    {
        $this->shipment = $shipment;
        return $this;
    }
    public function getShipment()
    {
        if ($this->shipment) {
            return $this->shipment;
        }
        if (!$this->cartId) {
            return false;
        }
        $shipment = \Mage::getModel("Model\Shipment");
        $this->setShipment($shipment);
        return $this->shipment;
    }

    /**Add Item To cart */
    // public function addItemToCart($product, $quantity, $addMode = false)
    // {

    //     $query = "SELECT * FROM `cart_item` WHERE `cartId` = {$this->cartId} AND `productId` = {$product->productId}";
    //     $cartItem = \Mage::getModel('Model\Cart\Item');
    //     $cartItem = $cartItem->fetchRow($query);
    //     if ($cartItem) {
    //         $cartItem->quantity += $quantity;
    //         $cartItem->save();
    //         return true;
    //     }
    //     $cartItem = \Mage::getModel('Model\Cart\Item');
    //     // $this->setCart($cartId);
    //     // $cartItem->cartId = $this->cartId;
    //     $cartItem->productId = $product->productId;
    //     $cartItem->price = $product->price;
    //     $cartItem->quantity = $quantity;
    //     $cartItem->discount = $product->discount;
    //     $cartItem->basePrice = $product->price;
    //     $cartItem->createdDate = date('Y:m:d H:i:s');
    //     $cartItem->save();
    //     return true;
    // }
    public function addItemToCart($product, $quantity, $addMode = false)
    {
        
        $this->products = $product;
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $query = "select * from `cart_item` where `cartId` = '{$this->cartId}' AND `productId` = '$product->productId'";
        $data = $cartItem->fetchRowByQuery($query);

        if ($data) {
            $data->quantity += $quantity;
            $cartItem->save();
            return true;
        }
        $cart = Mage::getModel('Model\Cart');
        $cartItem->cartId = $this->cartId;
        $cartItem->productId = $product->productId;
        $cartItem->price = $product->price;
        $cartItem->quantity = $quantity;
        $cartItem->discount = $product->discount;
        $cartItem->createdDate = date('Y-m-d H:i:s');
        $cartItem->save();
        return true;
    }
}
