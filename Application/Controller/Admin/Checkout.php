<?php

namespace Controller\Admin;

class Checkout extends \Controller\Core\Admin
{

    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        echo $layout->toHtml();
    }
    public function gridHtmlAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Cart\Checkout\Grid')->toHtml();
        $response = [
            'status' => 'success',
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $gridHtml
                ]

            ]
        ];
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($response);
    }
    public function saveAction()
    {
        $cartBillingAddress = \Mage::getModel('Model\Cart\Address');
        $cartShippingAddress = \Mage::getModel('Model\Cart\Address');
        $customerBillingAddress = \Mage::getModel('Model\Customer\CustomerAddress');
        $customerShippingAddress = \Mage::getModel('Model\Customer\CustomerAddress');
        $cartId = $this->getRequest()->getPost('cartId');
        $customerId = $this->getRequest()->getPost('customer');
        $saveBilling = $this->getRequest()->getPost('saveBillingAddress');
        $saveShipping = $this->getRequest()->getPost('saveShippingAddress');
        $sameAsBilling = $this->getRequest()->getPost('sameAsBilling');
        $billingId = $this->getRequest()->getPost('billingId');
        $billingData = $this->getRequest()->getPost('billing');
        $shippingId = $this->getRequest()->getPost('shippingId');
        $shippingData = $this->getRequest()->getPost('shipping');
        $paymentMethod = $this->getRequest()->getPost('paymentMethod');
        $shipmentMethod = $this->getRequest()->getPost('shipmentMethod');
        $total = $this->getRequest()->getPost('total');
        $discount = $this->getRequest()->getPost('discount');

        if ($billingId) {
            $customerBillingAddress->addressId = $billingId;
        }
        if ($shippingId) {
            $customerShippingAddress->addressId = $shippingId;
        }

        /**SAVE BILLING ON ADDRESS BOOK */
        if ($saveBilling == 'on') {
            $customerBillingAddress->addressId = $billingId;
            $customerBillingAddress->customerId = $customerId;
            $customerBillingAddress->addressType = 'billing';
            $query = "select * from `{$customerBillingAddress->getTableName()}` where addressId={$billingId}";
            $data = $customerBillingAddress->fetchRowByQuery($query);
            if ($data) {
                foreach ($billingData as $key => $value) {
                    $query = "Update `{$cartBillingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$billingId";
                    $cartBillingAddress->update($query);
                }
            }
            $customerBillingAddress->setData($billingData);
            $customerBillingAddress->save();
            $billingId = $customerBillingAddress->addressId;
        }
        $query = "select * from `{$cartBillingAddress->getTableName()}` where addressId={$billingId}";
        $data = $customerBillingAddress->fetchRowByQuery($query);
        if ($data) {
            foreach ($billingData as $key => $value) {
                $query = "Update `{$cartBillingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$billingId";
                $customerBillingAddress->update($query);
            }
        } else {
            $cartBillingAddress->cartId = $cartId;
            $cartBillingAddress->addressId = $billingId;
            $cartBillingAddress->addressType = 'billing';
            $cartBillingAddress->setData($billingData);
            $cartBillingAddress->save();
        }

        /** SAME AS BILLING */
        if ($sameAsBilling == 'on') {
            if ($saveShipping == 'on') {
                $customerShippingAddress->addressId = $shippingId;
                $customerShippingAddress->addressType = 'shipping';
                $customerShippingAddress->customerId = $customerId;
                $query = "select * from `{$customerShippingAddress->getTableName()}` where addressId={$shippingId}";
                $data = $customerShippingAddress->fetchRowByQuery($query);
                if ($data) {
                    foreach ($shippingData as $key => $value) {
                        $query = "Update `{$customerShippingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$shippingId";
                        $customerShippingAddress->update($query);
                    }
                }
                $customerShippingAddress->setData($billingData);
                $customerShippingAddress->save();
                $shippingId = $customerShippingAddress->addressId;
            }
            $query = "select * from `{$cartShippingAddress->getTableName()}` where addressId=$shippingId";
            $data = $cartShippingAddress->fetchRowByQuery($query);

            if ($data) {
                foreach ($billingData as $key => $value) {
                    $query = "Update `{$cartShippingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$shippingId";
                    $cartShippingAddress->update($query);
                }
            }
            /**SAVE AS SHIPPIG */
            else {
                $cartShippingAddress->cartId = $cartId;
                $cartShippingAddress->addressId = $shippingId;
                $cartShippingAddress->addressType = 'shipping';
                $cartShippingAddress->setData($billingData);
                $cartShippingAddress->save();
            }
        } else {
            if ($saveShipping == 'on') {
                $customerShippingAddress->addressId = $shippingId;
                $customerShippingAddress->addressType = 'shipping';
                $customerShippingAddress->customerId = $customerId;

                $query = "select * from `{$customerShippingAddress->getTableName()}` where addressId={$shippingId}";
                $data = $customerShippingAddress->fetchRowByQuery($query);
                if ($data) {
                    foreach ($shippingData as $key => $value) {
                        $query = "Update `{$customerShippingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$shippingId";
                        $customerShippingAddress->update($query);
                    }
                }

                $customerShippingAddress->setData($shippingData);
                $customerShippingAddress->save();
                $shippingId = $customerShippingAddress->addressId;
            }
            $query = "select * from `{$cartShippingAddress->getTableName()}` where addressId=$shippingId";
            $data = $cartShippingAddress->fetchRowByQuery($query);

            if ($data) {
                foreach ($shippingData as $key => $value) {
                    $query = "Update `{$cartShippingAddress->getTableName()}` set $key ='" . $value . "' where addressId=$shippingId";
                    $cartShippingAddress->update($query);
                }
            } else {
                $cartShippingAddress->cartId = $cartId;
                $cartShippingAddress->addressId = $shippingId;
                $cartShippingAddress->addressType = 'shipping';
                $cartShippingAddress->setData($shippingData);
                $cartShippingAddress->save();
            }
        }
        $cart = \Mage::getModel('Model\Cart');
        $cart->cartId = $cartId;
        $cart->total = $total;
        $cart->discount = $discount;
        $cart->paymentMethodId = $paymentMethod;
        $cart->shipmentMethodId = $shipmentMethod;
        $cart->save();


        /***************ORDER */
        $order = \Mage::getModel('Model\Order');
        $order->customerId = $customerId;
        $order->price = $total;
        $order->discount = $discount;
        $order->paymentMethodId = $paymentMethod;
        $order->shipmentMethodId = $shipmentMethod;
        $order->createdDate = date('Y-m-d H:i:s');

        $order = $order->save();
        $orderId = $order->orderId;
        $session = \Mage::getModel('Model\Admin\Session');
        $session->orderId = $orderId;

        $cartItems = \Mage::getModel('Model\Cart\Item');
        $query = "SELECT productId,quantity,price,discount,basePrice FROM `{$cartItems->getTableName()}` where cartId = $cartId";
        $cartItemsData = $cartItems->fetchAll($query);

        foreach ($cartItemsData->getData() as $key => $value) {
            $orderItem = \Mage::getModel('Model\Order\Orderitem');
            $orderItem->orderId = $orderId;
            $orderItem->productId = $value->productId;
            $orderItem->discount = $value->discount;
            $orderItem->price = $value->price;
            $orderItem->basePrice = $value->basePrice;
            $orderItem->quantity = $value->quantity;
            $orderItem->save();
        }
        //DELETE FROM CART ITEM
        $query = "DELETE FROM `{$cartItems->getTableName()}` WHERE `cartId` = $cartId";
        $cartItems->deleteByQuery($query);
        //DELETE FROM CART
        // $sql = "DELETE FROM `{$cart->getTableName()}` WHERE {$cart->getPrimaryKey()} = $cartId";
        // $cart->deleteByQuery($sql);
        

        $session = \Mage::getModel('Model\Admin\Session');
        $session->orderId = $orderId;




        // session_unset();
        // session_destroy();

        $this->redirect('gridHtml', 'Admin\Order', [], true);
    }
}
