<?php

namespace Block\Admin\CMS;

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\CMS\Edit\Tabs'));
    }
}
