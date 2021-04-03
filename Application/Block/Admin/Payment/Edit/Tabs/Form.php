<?php

namespace Block\Admin\Payment\Edit\Tabs;

class Form extends \Block\Core\Template {
    
    protected $payment = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Payment/Edit/Tabs/Form.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'Payment Add/Edit';
    }
}

?>