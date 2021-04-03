<?php

namespace Controller\Admin;

class Dashboard extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $form = \Mage::getBlock('Block\Admin\Dashboard\Index');
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addChild($form, 'form');
        echo $layout->toHtml();
    }
}
