<?php

namespace Controller\Admin;
\mage::getController('Controller\Core\Admin');


class CustomerGroup extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs')->toHtml();
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
            $gridHtml = \Mage::getBlock('Block\Admin\CustomerGroup\Edit');
            
            $id = (int)$this->getRequest()->getGet('editId');
            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            if($id) {
                $customerGroup = $customerGroup->fetchRow($id);
                if(!$customerGroup){
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($customerGroup)->toHtml();

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
            $customer = \Mage::getModel('Model\CustomerGroup');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $customer->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $customer->createdDate = date('Y-m-d h:i:s');
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('customerGroup', null);
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
            $customer = \Mage::getModel('Model\CustomerGroup');
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
}
