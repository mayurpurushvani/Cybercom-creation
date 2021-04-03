<?php

namespace Block\Admin\Product\Edit\Tabs;

class Form extends \Block\Core\Template
{
    protected $brandOptions = null;
    protected $product = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Product/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Product Add/Edit';
    }
    public function setProduct($product = null)
    {
        if ($product) {
            $this->$product = $product;
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
    public function getBrandOptions()
    {
        if (!$this->brandOptions) {
            $query = "SELECT `brandId`,`brandName` from `brand`";
            $this->brandOptions = $this->getProduct()->getAdapter()->fetchPairs($query);
        }
        return $this->brandOptions;
    }
}
