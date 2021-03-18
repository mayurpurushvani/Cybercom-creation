<?php
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Admin\Session');
// Mage::loadFileByClassName('Model_Core_Trait_Message');

class Message extends \Model\Admin\Session
{
    // use Model_Core_Trait_Message;

    public function __construct()
    {
        parent::__construct();
    }

    public function setSuccess($message)
    {
        $this->success = $message;
        return $this->success;
    }
    public function getSuccess()
    {
        return $this->success;
    }
    public function setFailure($message)
    {
        $this->failure = $message; 
        return $this->failure;
    }
    public function getFailure()
    {  
        return $this->failure;
    }
    public function clearMessage()
    {
        unset($this->success);
        unset($this->failure);
        return $this;
    }
}
