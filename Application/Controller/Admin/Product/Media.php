<?php

namespace Controller\Admin\Product;

use Exception;

\Mage::getController('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
        $response = [
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
    }
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $left = $layout->getChild('left');
        echo $layout->toHtml();
    }
    public function deleteAction()
    {
        try {
            $productMedia = \Mage::getModel('Model\Product\Media');
            $ids = $this->getRequest()->getPost('id');
            if (!$ids) {
                throw new \Exception("Invalid Id");
            }
            foreach ($ids as $id) {
                $id = (int) $id;

                $query = "SELECT `image` FROM `{$productMedia->getTableName()}` WHERE `{$productMedia->getPrimaryKey()}` = '$id'";
                $data = $productMedia->fetchRowByQuery($query);
                $image = $data->image;
                $productMedia->delete($id);
                unlink($image);
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
        $productMedia = \Mage::getModel('Model\Product\Media');

        foreach ($data['data'] as $key => $value) {
            $productMedia->fetchRow($key);
            if ($value['gallary'] == 'on') {
                $value['gallary'] = 1;
            } else {
                $value['gallary'] = 0;
            }
            $productMedia->SetData($value);
            $productMedia->save();
        }

        foreach ($data as $key => $value) {
            if ($value != []) {
                $id = $this->getRequest()->getGet('editId');
                $query = "update media set $key=0 where productId=$id";
                $productMedia->update($query);
                $productMedia->fetchRow($value);
                $productMedia->$key = 1;
                $productMedia->save();
            }
        }
        $this->gridHtmlAction();
    }
    public function addAction()
    {
        try {
            $dir = 'images/';
            $tmpName = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $newName = time() . "-" . rand(1000, 9999) . "-" . $fileName;
            if (!file_exists("$dir{$this->getRequest()->getGet('editId')}")) {
                mkdir("$dir{$this->getRequest()->getGet('editId')}", 0777, true);
            }
            $result = move_uploaded_file($tmpName, "$dir{$this->getRequest()->getGet('editId')}/{$newName}");
            if ($result) {

                $productMedia = \Mage::getModel('Model\Product\Media');
                $productMedia->image = "$dir{$this->getRequest()->getGet('editId')}/{$newName}";
                $productMedia->productId = $this->getRequest()->getGet('editId');

                $productMedia->save();
                $this->gridHtmlAction();
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}
