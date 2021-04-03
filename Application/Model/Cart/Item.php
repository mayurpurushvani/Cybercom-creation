<?php
namespace Model\Cart;

class Item extends \Model\Core\Table
{
  
    protected $cart = null;
    protected $product = null;

    public function __construct()
    {
        $this->setTableName("cart_item");
        $this->setPrimaryKey("cartItemId");
    }
   
    /**CART */
    public function getCart()
    {
        if(!$this->cartId){
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

    /**PRODUCT */

    public function getProduct()
    {
        if(!$this->productId){
            return false;
        }
        $productData = \Mage::getModel('Model\product')->fetchRow($this->productId);
        $this->setCart($productData);
        return $this->product;
    }

    public function setProduct(\Model\Product $product)
    {
        $this->protected = $product;
        return $this;
    }


}
