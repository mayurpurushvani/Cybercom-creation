<?php

namespace Controller\Core;

class Customer extends \Controller\Core\Abstracts
{
    protected $request = null;
    protected $message = null;
    protected $layout = null;
    protected $session = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setMessage();
        $this->setLayout();
    }
    
    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Customer\Message');
        return $this;
    }
    
    public function setLayout(\Block\Customer\Layout $layout = null)
    {
        if(!$layout) {
            $layout = \Mage::getBlock('Block\Customer\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
   
  
   
}
