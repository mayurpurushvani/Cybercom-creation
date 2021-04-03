<?php

namespace Controller\Admin;
class Test extends \Controller\Core\Admin
{
    public function testAction()
    {
        $product = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM `product` 
        WHERE `productId` = 40;";

        $data = $product->fetchRowByQuery($query);
        $product->sku = "abcd1234";
        
        echo '<pre>';
        print_r($data);
    }
}