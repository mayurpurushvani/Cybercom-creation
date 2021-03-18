<?php

namespace Controller\Admin\Customer;

\mage::getController('Controller\Core\Admin');


class CustomerAddress extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml
                ],
                [
                    'selector' => '#leftHtml',
                    'html' => null
                ]
            ]
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
    }
    public function formAction()
    {
        try {
            $gridHtml = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\CustomerAddress');

            $id = (int)$this->getRequest()->getGet('editId');
            $customerAddress = \Mage::getModel('Model\Customer\CustomerAddress');
            if ($id) {
                $customerAddress = $customerAddress->fetchRow($id);
                if (!$customerAddress) {
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($customerAddress)->toHtml();
            
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $grid
                    ],
                ]
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $address = \Mage::getModel('Model\Customer\CustomerAddress');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $address->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('shipping', null);
            $address->setData($data);
            $address->addressType = 'shipping';
            $address->customerId = $id;
            $address->save();

            $data = $this->getRequest()->getPost('billing', null);
            $address->setData($data);
            $address->addressType = 'billing';
            $address->customerId = $id;
            $address->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
