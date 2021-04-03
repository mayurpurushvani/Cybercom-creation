<?php

namespace Controller\Admin\Product;

class Attribute extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Attribute')->toHtml();
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
                    $product->$key = $value;
                    // $product = \Mage::getModel('Model\Product');
                    // $query = "UPDATE `{$product->getTableName()}` SET $key = '$value' WHERE `{$product->getPrimaryKey()}` = '$id'";
                    // $product->update($query);
                }
            } 
            $product->save();
            $product->setArrayData($keys, $values);
            $product->arrayUpdate($id);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridHtmlAction();
    }
}
