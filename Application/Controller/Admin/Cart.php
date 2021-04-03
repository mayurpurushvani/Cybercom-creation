<?php

namespace Controller\Admin;

use Exception;
use Mage;
use PDO;

class Cart extends \Controller\Core\Admin
{
    protected $cart = null;
    // protected $customerId = null;
    // protected $cartId = null;

    // public function addToCartAction()
    // {
    //     try {
    //         $product = \Mage::getModel('Model\Product');
    //         if (!$id = $this->getRequest()->getGet('editId')) {
    //             throw new Exception("Product Not Available");
    //         }
    //         $product = $product->fetchRow($id);
    //         $newCart = $this->getCart();
    //         // $cart = Mage::getBlock('Block\Admin\Cart\Cart');
    //         // $cart->setCart($newCart);
    //         $newCart->addItemToCart($product, 1, true); //product, quantity, add

    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    //     $this->redirect('gridHtml');
    // }
    // protected function getCart($customerId = null)
    // {
    //     $session = \Mage::getModel('Model\Admin\Session');
    //     $cart = \Mage::getModel('Model\Cart');
    //     if ($customerId) {
    //         $session->customerId = $customerId;
    //         $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `customerId` = {$session->customerId}";
    //         $cart = $cart->fetchRow($query);
    //         if ($cart) {
    //             $session->cartId = $cart->cartId;
    //             return $cart;
    //         }
    //     }
    //     $session->sessionId = $session->getId();
    //     $cart->sessionId = $session->sessionId;
    //     $cart->createdDate =  date('Y-m-d h:i:s');

    //     if (!$session->sessionId) {
    //         $cart->save();
    //     }

    //     $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `sessionId` = '{$session->sessionId}'";
    //     $cart = Mage::getModel('Model\Cart');
    //     $cartData = $cart->fetchRow($query);
    //     print_r($cartData);
    //     $session->cartId = $cartData['cartId'];
    //     return $cart;
    // }


    public function addToCartAction()
    {
        // session_start();
        // session_unset();
        // session_destroy();
        try {
            $productId = (int)$this->getRequest()->getGet('editId');
            $product = \Mage::getModel('Model\Product');
            if (!$productId) {
                throw new Exception('Not valid');
            }
            $product = $product->fetchRow($productId);
            if (!$product) {
                throw new Exception("Not Available!", 1);
            }
            $cart = $this->getCart();
            $cart->addItemToCart($product, 1, true);
        } catch (Exception $e) {
        }
        $this->redirect('gridHtml');
    }

    public function getCart($customerId = null)
    {

        $session = \Mage::getModel('Model\Admin\Session');

        if ($customerId) {
            $session->customerId = $customerId;
        }

        $cart = \Mage::getModel('Model\Cart');
        $query = "select * from `cart` where customerId = '{$session->customerId}'";

        $cart = $cart->fetchRowByQuery($query);
        if ($cart) {
            $session->cartId = $cart->cartId;
            return $cart;
        }
        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->createdDate = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;
    }


    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        echo $layout->toHtml();
    }

    public function selectCustomerAction()
    {
        // $session = Mage::getModel('Model\Admin\Session');
        $customerId = $this->getRequest()->getPost('customer');
        $this->getCart($customerId);
        // $session->customerId = $customerId;
        $this->redirect('gridHtml', 'Admin\Cart', [], true);
    }
    public function gridHtmlAction()
    {
        // $session = Mage::getModel('Model\Admin\Session');
        // $session->customerId = $this->customerId;
        // $session->cartId = $this->cartId;
        $gridHtml = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();

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

    public function updateAction()
    {
        try {
            $cartItemData = $this->getRequest()->getPost('quantity');
            foreach ($cartItemData as $cartItemId => $quantity) {
                $item = \Mage::getModel('Model\Cart\Item');
                $query = "SELECT * FROM `cart_item` WHERE `cartItemId` = $cartItemId";
                $data = $item->fetchRowByQuery($query);
                $data->cartItemId = $cartItemId;
                $data->quantity = $quantity;
                $data->save();
            }
        } catch (\Exception $e) {
            // $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('gridHtml');
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('deleteId');
            if (!$id) {
                throw new \Exception('Id Invalid');
            }
            $item = \Mage::getModel('Model\Cart\Item');
            $item->cartItemId = $id;
            if ($item->delete($id)) {
                // $this->getMessage()->setSuccess('Item deleted from cart successfully');
            } else {
                // $this->getMessage()->setFailure('Unable to delete record');
            }
        } catch (\Exception $e) {
            // $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('gridHtml');
    }
}
