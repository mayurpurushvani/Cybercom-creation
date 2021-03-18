<?php

namespace Block\Admin\Attribute;

\mage::getBlock('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    protected $attribute = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
    }
}
