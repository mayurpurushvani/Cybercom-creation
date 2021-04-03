<?php

namespace Block\Admin\Cart;

use Mage;

class Grid extends \Block\Core\Template
{
    // protected $items = null;
    // protected $id = null;
    // protected $cartItems = [];

    // public function __construct()
    // {
    //     $this->setTemplate('View/Admin/Cart/Cart.php');
    // }

    // public function getCustomers()
    // {
    //     $customer = Mage::getModel('Model\Customer');
    //     $customer = $customer->fetchAll();
    //     return $customer;
    // }
    // public function setCart(\Model\Cart $cart)
    // {
    //     $this->cart = $cart;
    //     return $this;
    // }

    // public function getCart()
    // {
    //     if (!$this->cart) {
    //         $cart = Mage::getModel('Model\Cart');
    //         $this->setCart($cart);
    //     }
    //     return $this->cart;
    // }


    protected $cart = null;
    protected $id = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Cart/Grid.php');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
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
}
