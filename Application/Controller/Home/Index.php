<?php

namespace Controller\Home;

use Exception;

\mage::getController('Controller\Core\Customer');


class Index extends \Controller\Core\Customer
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
    }
}
