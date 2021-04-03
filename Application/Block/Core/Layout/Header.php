<?php
namespace Block\Core\Layout;

class Header extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Core/Layout/header.php');
    }
    
}

?>