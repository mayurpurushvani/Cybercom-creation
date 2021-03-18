<?php

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class CustomerAddress extends \Block\Core\Template
{

    protected $address = null;
    protected $shipping = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/CustomerAddress.php');
    }

    /**Shipping */
    public function setShippingAddress($shipping = null)
    {
        if ($this->shipping) {
            $this->shipping = $shipping;
            return $this;
        }
        $address = \Mage::getModel('Model\Customer\CustomerAddress');
        $customerId = $this->getTableRow()->customerId;
        

        if ($customerId) {
            $query = "SELECT addressId from customer_Address WHERE customerId = " . $customerId ." AND addressType = 'shipping'";
            $addressArray = $address->fetchRowByQuery($query);
            if ($addressArray) {
                $addressId = $address->addressId;
                $customerAddress = $address->fetchRow($addressId);
                if ($customerAddress) {
                    $id = $customerAddress->addressId;
                    $shipping = $address->fetchRow($id);
                }
            }
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getShippingAddress()
    {
        if (!$this->shipping) {
            $this->setShippingAddress();
        }
        return $this->shipping;
    }
   
/**Billing */

    public function setBillingAddress($address = null)
    {
        if ($this->address) {
            $this->address = $address;
            return $this;
        }
        $address = \Mage::getModel('Model\Customer\CustomerAddress');
        $customerId = $this->getTableRow()->customerId;


        if ($customerId) {
            $query = "SELECT addressId from customer_Address WHERE customerId = " . $customerId ." AND addressType = 'billing'";
            $addressArray = $address->fetchRowByQuery($query);
            if ($addressArray) {
                $addressId = $address->addressId;
                $customerAddress = $address->fetchRow($addressId);
                if ($customerAddress) {
                    $id = $customerAddress->addressId;
                    $address = $address->fetchRow($id);
                }
            }
        }
        $this->address = $address;
        return $this;
    }
    public function getBillingAddress()
    {
        if (!$this->address) {
            $this->setBillingAddress();
        }
        return $this->address;
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('saveAdress');
    }
    public function getTitle()
    {
        return 'Address Add/Edit';
    }
}
