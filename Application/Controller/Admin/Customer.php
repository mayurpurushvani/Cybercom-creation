<?php

namespace Controller\Admin;
\mage::getController('Controller\Core\Admin');


class Customer extends \Controller\Core\Admin
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
            $gridHtml = \Mage::getBlock('Block\Admin\Customer\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $customer = \Mage::getModel('Model\Customer');
            if($id) {
                $customer = $customer->fetchRow($id);
                if(!$customer){
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($customer)->toHtml();

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
            $customer = \Mage::getModel('Model\Customer');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $customer->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
                $customer->updatedDate = date('Y-m-d h:i:s');
            }
            if (!$id) {
                $customer->createdDate = date('Y-m-d h:i:s');
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('customer', null);
            $customer->setData($data);
            $customer->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
    
    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('deleteId');
            if (!$id) {
                throw new \Exception("Invalid Id");
            }
            $customer = \Mage::getModel('Model\Customer');
            if ($customer->delete($id)) {
                $this->getMessage()->setSuccess('Record Deleted!');
            } else {
                $this->getMessage()->setFailure('Record Not Deleted!');
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
    public function selectAction()
    {
        $selectId = $this->getRequest()->getGet('selectId');
        $id = $this->getRequest()->getGet('editId');
        $customer = \Mage::getModel('Model\Customer');
        $customer->select($id, $selectId);

        $this->gridHtmlAction();
    
    }
}
