<?php

namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Session');
// Mage::loadFileByClassName('Model_Core_Trait_Message');

class Message extends \Model\Core\Session{

    // use Model_Core_Trait_Message;
  
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }
    public function getSuccess()
    {
        return $this->success;
    }
    
    public function setFailure($message)
    {
        $this->success = $message;
        return $this;
    }
    public function getFailure()
    {
        return $this->success;
    }
    
}
?>