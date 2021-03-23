<?php

namespace Controller\Admin\Category;

use Exception;

\Mage::getController('Controller\Core\Admin');

class Image extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Image')->toHtml();
        $tabHtml = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();
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
            $categoryImage = \Mage::getModel('Model\Category\Image');
            $ids = $this->getRequest()->getPost('id');
            if (!$ids) {
                throw new \Exception("Invalid Id");
            }
            foreach ($ids as $id) {
                $id = (int) $id;

                $query = "SELECT `image` FROM `{$categoryImage->getTableName()}` WHERE `{$categoryImage->getPrimaryKey()}` = '$id'";
                $data = $categoryImage->fetchRowByQuery($query);
                $image = $data->image;
                $categoryImage->delete($id);
                unlink($image);
            }
            $this->gridHtmlAction();
            $this->getMessage()->setSuccess('Record Deleted!');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function addAction()
    {
        try {
            $dir = 'images/Categories/';
            $tmpName = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $newName = time() . "-" . rand(1000, 9999) . "-" . $fileName;
            if (!file_exists("$dir{$this->getRequest()->getGet('editId')}")) {
                mkdir("$dir{$this->getRequest()->getGet('editId')}", 0777, true);
            }
            $result = move_uploaded_file($tmpName, "$dir{$this->getRequest()->getGet('editId')}/{$newName}");
            if ($result) {

                $categoryImage = \Mage::getModel('Model\Category\Image');
                $categoryImage->image = "$dir{$this->getRequest()->getGet('editId')}/{$newName}";
                $categoryImage->categoryId = $this->getRequest()->getGet('editId');
                $categoryImage->createdDate = date('Y-m-d h:i:s');
                $categoryImage->save();
                $this->gridHtmlAction();
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function formAction()
    {
        try {
            $gridHtml = \Mage::getBlock('Block\Admin\Category\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $admin = \Mage::getModel('Model\Category\Image');
            if ($id) {
                $admin = $admin->fetchRow($id);
                if (!$admin) {
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


    public function selectAction()
    {
        $selectId = $this->getRequest()->getGet('selectId');
        $categoryId = $this->getRequest()->getGet('categoryId');

        $id = $this->getRequest()->getGet('editId');
        $image = \Mage::getModel('Model\Category\Image');
        $image->select($id, $selectId);
        // $this->gridHtmlAction();
        $this->redirect('form', 'Admin\Category\Image', ["tab"=>"Images", 'editId'=>$categoryId, 'selectId'=>$selectId], true);
    }
    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        $categoryImage = \Mage::getModel('Model\Category\Image');

        foreach ($data['data'] as $key => $value) {
            $categoryImage->fetchRow($key);
            if ($value['banner'] == 'on') {
                $value['banner'] = 1;
            } else {
                $value['banner'] = 0;
            }
            $categoryImage->SetData($value);
            $categoryImage->save();
        }

        foreach ($data as $key => $value) {
            if ($value != []) {
                $id = $this->getRequest()->getGet('editId');
                $query = "update category_image set $key=0 where categoryId=$id";
                $categoryImage->update($query);
                $categoryImage->fetchRow($value);
                $categoryImage->$key = 1;
                $categoryImage->save();
            }
        }
        $this->gridHtmlAction();
    }
}
