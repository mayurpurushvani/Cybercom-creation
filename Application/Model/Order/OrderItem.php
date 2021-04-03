<?php

namespace Model\Order;

class OrderItem extends \Model\Core\Table
{

    public function __construct()
    {
        // parent::__construct();
        $this->setPrimaryKey('orderItemId');
        $this->setTableName('order_item');
    }
}
