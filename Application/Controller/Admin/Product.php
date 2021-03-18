<?php

namespace Controller\Admin;

\Mage::getController('Controller\Core\Admin');

class Product extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
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
            $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $product = \Mage::getModel('Model\Product');
            if($id) {
                $product = $product->fetchRow($id);
                if(!$product){
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($product)->toHtml();

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
            $product = \Mage::getModel('Model\Product');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $product->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
                $product->updatedDate = date('Y-m-d h:i:s');
            }
            if (!$id) {
                $product->createdDate = date('Y-m-d h:i:s');

                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('product', null);
            $product->setData($data);
            $product->save();
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
            $product = \Mage::getModel('Model\Product');
            if ($product->delete($id)) {
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
        $product = \Mage::getModel('Model\Product');
        $product->select($id, $selectId);
        $this->gridHtmlAction();
    }
}
