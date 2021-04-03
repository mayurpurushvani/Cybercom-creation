<?php

namespace Controller\Home;

use Exception;


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
