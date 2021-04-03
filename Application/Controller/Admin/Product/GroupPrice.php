<?php
namespace Controller\Admin\Product;

class GroupPrice extends \Controller\Core\Admin
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
    public function groupPriceAction()
    {
        $groupData = $this->getRequest()->getPost('groupPrice');

        $productId = $this->getRequest()->getGet('editId');
        if ($groupData['exists']) {
            foreach ($groupData['exists'] as $groupId => $price) {
                $query = "SELECT * FROM product_group_price
            WHERE `productId` = '{$productId}'
            AND `customerGroupId` = '{$groupId}'
            ";
                $groupPrice = \Mage::getModel('Model\Product\GroupPrice');
                $groupPrice->fetchRowByQuery($query);
                $groupPrice->price = $price;
                $groupPrice->save();
            }
        }
        if ($groupData['new']) {

            foreach ($groupData['new'] as $groupId => $price) {
                $groupPrice = \Mage::getModel('Model\Product\GroupPrice');
                $groupPrice->customerGroupId = $groupId;
                $groupPrice->productId = $productId;
                $groupPrice->price = $price;
                $groupPrice->save();
            }
        }
        $this->gridHtmlAction();
    }
}
