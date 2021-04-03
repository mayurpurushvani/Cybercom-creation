<?php

namespace Controller\Admin;

use Exception;
use Mage;



class Filter extends \Controller\Core\Admin
{
    public function filterAction()
    {
        try {
            // session_start();
            // session_unset();
            // session_destroy();
            // echo '<pre>'; print_r($_SESSION);die;
            $filter = $this->getRequest()->getPost('filter');
            $filterModel = Mage::getModel('Model\Admin\Filter');
            $filterModel->setFilters($filter);

            if ($filter) {
                if ($filter['category']) {
                    $this->redirect('gridHtml', 'Admin\Category');
                }
                if ($filter['adminTable']) {
                    $this->redirect('gridHtml', 'Admin\Admin');
                }
                if ($filter['attribute']) {
                    $this->redirect('gridHtml', 'Admin\Attribute');
                }
                if ($filter['customer_group']) {
                    $this->redirect('gridHtml', 'Admin\customerGroup');
                }
                if ($filter['CMS']) {
                    $this->redirect('gridHtml', 'Admin\CMS');
                }
                if ($filter['payment']) {
                    $this->redirect('gridHtml', 'Admin\Payment');
                }
                if ($filter['product']) {
                    $this->redirect('gridHtml', 'Admin\Product');
                }
                if ($filter['customer']) {
                    $this->redirect('gridHtml', 'Admin\Customer');
                }
                if ($filter['shipment']) {
                    $this->redirect('gridHtml', 'Admin\Shipment');
                }
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
