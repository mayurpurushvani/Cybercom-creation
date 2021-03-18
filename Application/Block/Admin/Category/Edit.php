<?php

namespace Block\Admin\Category;

\mage::getBlock('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    protected $category = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
    }
}
