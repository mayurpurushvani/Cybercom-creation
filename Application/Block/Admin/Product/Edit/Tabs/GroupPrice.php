<?php

namespace Block\Admin\Product\Edit\Tabs;

class GroupPrice extends \Block\Core\Template {
    
    protected $product = null;
    protected $customerGroups = [];

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/GroupPrice.php');   
    }
    public function setProduct(\Model\Product $product = null)
    {
        if ($product) {
            $this->product = $product;
            return $this;
        }
        $product = \Mage::getModel('Model\Product');
        $id = $this->getTableRow()->productId;
        if ($id) {
            $product = $product->fetchRow($id);
        }
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }
    public function getCustomerGroup()
    {
        $query = "SELECT cg.*, pgp.productId, pgp.entityId, pgp.price as groupPrice,
        if(p.price IS NULL, '{$this->getProduct()->price}', p.price) as price
        FROM customer_group cg
        LEFT JOIN product_group_price pgp
            ON pgp.customerGroupId = cg.groupId
                AND pgp.productId = '{$this->getProduct()->productId}'
        LEFT JOIN product p
            ON pgp.productId = p.productId
        ";

        $customerGroups = \Mage::getModel('Model\CustomerGroup');
        $this->customerGroups = $customerGroups->fetchAll($query);
        return $this->customerGroups;
    }
}

?>