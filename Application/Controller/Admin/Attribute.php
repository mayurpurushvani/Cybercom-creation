<?php

namespace Controller\Admin;

\mage::getController('Controller\Core\Admin');


class Attribute extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs')->toHtml();
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
            $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $attribute = \Mage::getModel('Model\Attribute');
            if ($id) {
                $attribute = $attribute->fetchRow($id);
                if (!$attribute) {
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($attribute)->toHtml();

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
            $attribute = \Mage::getModel('Model\Attribute');

            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $attribute->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost('attribute', null);

            $query = "ALTER TABLE {$data['entityTypeId']} ADD {$data['name']} {$data['backendType']}";
            $result = $attribute->getAdapter()->select($query);
            $attribute->setData($data);

            $attribute->save();

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
            $attribute = \Mage::getModel('Model\Attribute');
            if ($attribute->delete($id)) {
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
