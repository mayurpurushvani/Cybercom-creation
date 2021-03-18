<?php

namespace Controller\Admin;

use Exception;

\mage::getController('Controller\Core\Admin');


class Admin extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs')->toHtml();
        $response = [
            'status' => 'success',
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
            $gridHtml = \Mage::getBlock('Block\Admin\Admin\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $admin = \Mage::getModel('Model\Admin');
            if($id) {
                $admin = $admin->fetchRow($id);
                if(!$admin){
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($admin)->toHtml();

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
            $admin = \Mage::getModel('Model\Admin');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $admin->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $admin->createdDate = date('Y-m-d h:i:s');
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('admin', null);
            $admin->setData($data);
            $admin->save();

            $this->gridHtmlAction();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('deleteId');
            if (!$id) {
                throw new \Exception("Invalid Id");
            }
            $admin = \Mage::getModel('Model\Admin');
            if ($admin->delete($id)) {
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
        $admin = \Mage::getModel('Model\Admin');
        $admin->select($id, $selectId);
        $this->gridHtmlAction();
    }
}
