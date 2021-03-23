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
    // public function formAction()
    // {
    //     try {
    //         $gridHtml = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\CustomerAddress');

    //         $id = (int)$this->getRequest()->getGet('editId');
    //         $customerAddress = \Mage::getModel('Model\Customer\CustomerAddress');
    //         if ($id) {
    //             $customerAddress = $customerAddress->fetchRow($id);
    //             if (!$customerAddress) {
    //                 throw new \Exception('No Record Found!');
    //             }
    //         }
    //         $grid = $gridHtml->setTableRow($customerAddress)->toHtml();

    //         $response = [
    //             'status' => 'success',
    //             'element' => [
    //                 [
    //                     'selector' => '#contentHtml',
    //                     'html' => $grid
    //                 ],
    //             ]
    //         ];
    //         header("Content-type:appliction/json; charset=utf-8");
    //         echo json_encode($response);
    //     } catch (\Exception $e) {
    //         $e->getMessage();
    //     }
    // }
    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $billingAddress = \Mage::getModel('Model\Customer\CustomerAddress');
            $shippingAddress = \Mage::getModel('Model\Customer\CustomerAddress');

            if ($updateId = $this->getRequest()->getGet('editId')) {
                $result = $shippingAddress->fetchRow($updateId);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$updateId) {
                $this->getMessage()->setSuccess('Record Inserted!');
            }

            if ($id = $this->getRequest()->getPost('billingId')) {
                $billingAddress->addressId = $id;
            }
            if ($id = $this->getRequest()->getPost('shippingId')) {
                $shippingAddress->addressId = $id;
            }


            $data = $this->getRequest()->getPost('shipping', null);
            $shippingAddress->setData($data);
            $shippingAddress->addressType = 'shipping';
            $shippingAddress->customerId = $updateId;
            $shippingAddress->save();

            $data = $this->getRequest()->getPost('billing', null);
            $billingAddress->setData($data);
            $billingAddress->addressType = 'billing';
            $billingAddress->customerId = $updateId;
            $billingAddress->save();

            $this->redirect('gridHtml', 'Admin\Customer', ['page'=>1], true );

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}
