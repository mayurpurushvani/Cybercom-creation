<?php

namespace Controller\Admin;

\mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Category\Grid');

        $id = (int)$this->getRequest()->getGet('editId');
        $category = \Mage::getModel('Model\Category');
        if ($id) {
            $category = $category->fetchRow($id);
            if (!$category) {
                throw new \Exception('No Record Found!');
            }
        }
        $grid = $gridHtml->setTableRow($category)->toHtml();

        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $grid
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
            $gridHtml = \Mage::getBlock('Block\Admin\Category\Edit');

            $id = (int)$this->getRequest()->getGet('editId');
            $category = \Mage::getModel('Model\Category');
            if ($id) {
                $category = $category->fetchRow($id);
                if (!$category) {
                    throw new \Exception('No Record Found!');
                }
            }
            $grid = $gridHtml->setTableRow($category)->toHtml();
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
        $category = \Mage::getModel('Model\Category');
        if ($categoryId = $this->getRequest()->getGet('editId')) {
            $categoryData = $category->fetchRow($categoryId);
            if (!$categoryData) {
                throw new \Exception("Invalid Id");
            }
        }
        $categoryPathId = $category->path;
        // echo $category->path;die();

        $categoryData = $this->getRequest()->getPost('category');
        $category->setData($categoryData);
        if (!$categoryId) {
            $category->createdDate = date('Y-m-d h:i:s');
        }
        $category->save();

        //UPDATE PATH 
        $category->updatePathId();

        //MANAGE CHILDREN
        $category->updateChildrenPathIds($categoryPathId);

        //REDIRECTION
        $this->gridHtmlAction();
    }


    public function deleteAction()
    {
        $category = \Mage::getModel('Model\Category');
        if ($categoryId = $this->getRequest()->getGet('deleteId')) {
            $category = $category->fetchRow($categoryId);
            if (!$category) {
                throw new \Exception("Invalid Id");
            }
        }
        $path = $category->path;
        $parentId = $category->parentId;
        $category->updateChildrenPathIds($path, $parentId);
        $category->delete($categoryId);

        $this->gridHtmlAction();
    }
    public function selectAction()
    {

        $selectId = $this->getRequest()->getGet('selectId');
        $id = $this->getRequest()->getGet('editId');
        $category = \Mage::getModel('Model\Category');
        $category->select($id, $selectId);

        $this->gridHtmlAction();
    }
}
