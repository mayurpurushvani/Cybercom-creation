<?php

namespace Controller\Admin;

class Brand extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Brand\Brand')->toHtml();
        $response = [
            'element' => [
                [

                    'selector' => '#contentHtml',
                    'html' => $gridHtml
                ],
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
            $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit')->toHtml();
            $tabHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
            $response = [
                'status' => 'success',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $gridHtml
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $tabHtml
                    ]
                ]
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    public function deleteAction()
    {
        try {
            $brand = \Mage::getModel('Model\Brand');
            $ids = $this->getRequest()->getPost('id');
            if (!$ids) {
                throw new \Exception("Invalid Id");
            }
            foreach ($ids as $id) {
                $id = (int) $id;
                $query = "SELECT `image` FROM `{$brand->getTableName()}` WHERE `{$brand->getPrimaryKey()}` = '$id'";
                $data = $brand->fetchRowByQuery($query);
                $image = $data->image;
                if ($brand->delete($id)) {
                    unlink($image);
                }
            }
            // $this->redirect('gridHtml',null);
            $this->gridHtmlAction();
            $this->getMessage()->setSuccess('Record Deleted!');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        $brand = \Mage::getModel('Model\Brand');
        foreach ($data['data'] as $key => $value) {
            if ($value != []) {
                $query = "UPDATE `brand` SET `brandName` = '{$value['brandName']}', `sortOrder` = '{$value['sortOrder']}' WHERE `brandId` = '$key'";
                $brand->update($query);
            }
        }
        $this->gridHtmlAction();
    }
    public function addAction()
    {
        $data = $this->getRequest()->getPost();
        $dir = 'images/Brand/';
        $tmpName = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $newName = time() . "-" . rand(1000, 9999) . "-" . $fileName;
        if (!file_exists("$dir")) {
            mkdir("$dir", 0777, true);
        }
        $result = move_uploaded_file($tmpName, "$dir{$newName}");
        if ($result) {
            $brand = \Mage::getModel('Model\Brand');
            $brand->image = "$dir{$newName}";
            $brand->brandName = "";
            $brand->createdDate = date('Y-m-d h:i:s');
            $brand->sortOrder = "";
            $brand->save();
            $this->gridHtmlAction();
        }
    }
    public function selectAction()
    {
        $selectId = $this->getRequest()->getGet('selectId');
        $id = $this->getRequest()->getGet('editId');
        $admin = \Mage::getModel('Model\Brand');
        $admin->select($id, $selectId);
        $this->gridHtmlAction();
    }
}
