<?php

namespace Controller\Admin\Attribute;

class Option extends \Controller\Core\Admin
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
            $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Edit')->toHtml();
            $tabHtml = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs')->toHtml();
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
    /**UPDATE OPTION */

    public function updateAction()
    {
        $option = \Mage::getModel('Model\Attribute\Option');
        $existData = $this->getRequest()->getPost('option');
        $newData = $this->getRequest()->getPost('new');

        $id = $this->getRequest()->getGet('editId');
        $ids = [];


        foreach ($existData as $optionId => $value) {
            $query = "UPDATE `{$option->getTableName()}` SET name='" . $value['name'] . "',sortOrder=" . $value['sortOrder'] . " where `{$option->getPrimaryKey()}`=$optionId ";
            $option->update($query);
        }


        for ($i = 0; $i < count($newData); $i = $i + 2) {
            $newOption = \Mage::getModel('Model\Attribute\Option');
            $nextElement = $i + 1;
            $newOption->name = $newData[$i];
            $newOption->sortOrder = $newData[$nextElement];
            $newOption->attributeId = $id;
            $obj = $newOption->save();
            array_push($ids, $obj->optionId);
        }

        foreach ($existData as $optionId => $value) {
            array_push($ids, $optionId);
        }
        if (empty($ids)) {
            $query = "DELETE FROM `{$option->getTableName()}` WHERE `attributeId` = '$id';";
        } else {
            $query = "DELETE FROM `{$option->getTableName()}` where `attributeId` =  '$id' AND `{$option->getPrimaryKey()}` NOT IN (" . implode(', ', $ids) . ") ";
        }
        $option->deleteByQuery($query);

        $this->gridHtmlAction();
    }
}
