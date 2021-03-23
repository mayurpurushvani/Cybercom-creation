<?php
namespace Block\Customer\Layout;

\mage::getBlock('Block\Core\Template');
class Header extends \Block\Core\Template
{
    protected $categories = [];
    protected $products = [];
    public function __construct()
    {
        $this->setTemplate('View/Customer/Layout/header.php');
    }
    public function getCategories()
    {
        $category =  \Mage::getModel('Model\Category');
        $query = "SELECT * from `category` WHERE `path` NOT LIKE '%=%'";
        $collection = $category->fetchAll($query);
        foreach($collection->getData() as $key => $value){
            $categories[] = $value->categoryName;
        }
        return $categories;
    }
    public function getProducts()
    {
        $product =  \Mage::getModel('Model\Product');
        $query = "SELECT * from `product`";
        $collection = $product->fetchAll($query);
        foreach($collection->getData() as $key => $value){
            $products[] = $value->name;
        }
        return $products;
    }
}
