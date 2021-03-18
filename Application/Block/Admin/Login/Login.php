<?php

namespace Block\Admin\Login;
\Mage::loadFileByClassName('Block_Core_Template');
class Login extends \Block\Core\Template {
    
    protected $admin = null;
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('../View/Admin/Login/Login.php');
    }
    public function setAdmin($admin = null)
    {
        if ($this->admin) {
            $this->admin = $admin;
            return $this;
        }
        $admin = \Mage::getModel('Model\Admin');
        $userName = $this->getRequest()->getPost('userName');
        $password = $this->getRequest()->getPost('password');
        if ($userName && $password) {
            $admin = $admin->login($userName, $password);
        }
        $this->admin = $admin;
        return $this;
    }
    public function getAdmin()
    {
        if (!$this->admin) {
            $this->setAdmin();
        }
        return $this->admin;
    }
}

?>