<?php

namespace Controller\Admin;
\mage::getController('Controller\Core\Admin');


class CMS extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\CMS\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\CMS\Edit\Tabs')->toHtml();
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
            $gridHtml = \Mage::getBlock('Block\Admin\CMS\Edit');
            
            $id = (int)$this->getRequest()->getGet('editId');
            $CMS = \Mage::getModel('Model\CMS');
            if($id) {
                $CMS = $CMS->fetchRow($id);
                if(!$CMS){
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($CMS)->toHtml();
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
            $CMS = \Mage::getModel('Model\CMS');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $CMS->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $CMS->createdDate = date('Y-m-d h:i:s');
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('CMS', null);
           
            $CMS->setData($data);
            $CMS->save();

            $this->redirect('gridHtml', null, ['page'=>1], true );
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
            $CMS = \Mage::getModel('Model\CMS');
            if ($CMS->delete($id)) {
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
        $CMS = \Mage::getModel('Model\CMS');
        $CMS->select($id, $selectId);
        $this->gridHtmlAction();
    }
}
