<?php

namespace Controller\Admin;

\Mage::getController('Controller\Core\Admin');
class Payment extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs')->toHtml();
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
            $gridHtml = \Mage::getBlock('Block\Admin\Payment\Edit');

        $id = (int)$this->getRequest()->getGet('editId');
        $payment = \Mage::getModel('Model\Payment');
        if($id) {
            $payment = $payment->fetchRow($id);
            if(!$payment){
                throw new \Exception('No Record Found!');
            }
        }
        $grid = $gridHtml->setTableRow($payment)->toHtml();

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
            $payment = \Mage::getModel('Model\Payment');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $payment->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $this->getMessage()->setSuccess('Record Inserted!');
                $payment->createdDate = date('Y-m-d h:i:s');
            }
            $data = $this->getRequest()->getPost('payment', null);
            $payment->setData($data);
            $payment->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('gridHtml', null, ['page'=>1], true );
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('deleteId');
            if (!$id) {
                throw new \Exception("Invalid Id");
            }
            $payment = \Mage::getModel('Model\Payment');
            if ($payment->delete($id)) {
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
        $payment = \Mage::getModel('Model\Payment');
        $payment->select($id, $selectId);
        $this->gridHtmlAction();
    }
}
