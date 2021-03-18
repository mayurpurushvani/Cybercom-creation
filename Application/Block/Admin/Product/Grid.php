<?php

namespace Block\Admin\Product;
\mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $products = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/product.php');   
    }
    public function setProducts($products = null)
    {
        if($this->products) {
            $this->products = $products;
        }
        if(!$products) {
            $product = \Mage::getModel('Model\Product');
            $rows = $product->fetchAll();
            $this->products = $rows;
        }
        return $this;
    }
    public function getProducts()
    {
        if(!$this->products) {
            $this->setProducts();
        }
        return $this->products;
    }
}
?>