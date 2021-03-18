<?php

namespace Controller\Admin\Category;

\Mage::getController('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Attribute')->toHtml();
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
    public function formAction()
    {
        try {
            $gridHtml = \Mage::getBlock('Block\Admin\Category\Edit')->toHtml();
            $tabHtml = \Mage::getBlock('Block\Admin\Category\Edit\Tabs')->toHtml();
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
    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $category = \Mage::getModel('Model\Category');
            if ($id = $this->getRequest()->getGet('editId')) {
                $result = $category->fetchRow($id);
                if ($result) {
                    $this->getMessage()->setSuccess('Record Updated!');
                } else {
                    $this->getMessage()->setFailure('Record Not Updated!');
                }
            }
            if (!$id) {
                $this->getMessage()->setSuccess('Record Inserted!');
            }
            $data = $this->getRequest()->getPost();

            $values = [];
            $keys = [];

            foreach($data as $key => $value) {
                
                if(is_array($value)) {     
                    array_push($keys, $key);
                    array_push($values, $value);
                } else {
                    $category->$key = $value;
                }
            } 
            $category->save();
            $category->setArrayData($keys, $values);
            $category->arrayUpdate($id);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
