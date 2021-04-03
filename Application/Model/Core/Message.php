<?php

namespace Model\Core;

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