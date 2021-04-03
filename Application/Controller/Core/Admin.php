<?php

namespace Controller\Core;

class Admin extends \Controller\Core\Abstracts
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
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
    
    public function setLayout(\Block\Admin\Layout $layout = null)
    {
        if(!$layout) {
            $layout = \Mage::getBlock('Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
   
  
   
}
