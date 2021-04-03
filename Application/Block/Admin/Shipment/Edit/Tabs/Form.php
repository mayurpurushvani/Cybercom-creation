<?php

namespace Block\Admin\Shipment\Edit\Tabs;

class Form extends \Block\Core\Template {
    
    protected $shipment = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Shipment/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Shipment Add/Edit';
    }
}

?>