<?php

namespace Block\Admin\Customer;

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareStatus();

    }
    public function prepareColumns()
    {

        // session_start();
        // session_reset();
        // session_destroy();
        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $customer = $filterModel->getFilters('customer');

        $this->addColumn('customerId', [
            'field' => 'customerId',
            'label' => 'Customer Id',
            'value' => $customer['customerId'],
            'name' => 'filter[customer][customerId]',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'value' => $customer['name'],
            'name' => 'filter[customer][name]',
            'label' => 'Group',
            'type' => 'text'
        ]);

        $this->addColumn('firstName', [
            'field' => 'firstName',
            'label' => 'First Name',
            'value' => $customer['firstName'],
            'name' => 'filter[customer][firstName]',
            'type' => 'text'
        ]);
        $this->addColumn('lastName', [
            'field' => 'lastName',
            'value' => $customer['lastName'],
            'name' => 'filter[customer][lastName]',
            'label' => 'Last Name',
            'type' => 'text'
        ]);
        $this->addColumn('email', [
            'field' => 'email',
            'value' => $customer['email'],
            'name' => 'filter[customer][email]',
            'label' => 'Email',
            'type' => 'text'
        ]);
        $this->addColumn('mobile', [
            'field' => 'mobile',
            'value' => $customer['mobile'],
            'name' => 'filter[customer][mobile]',
            'label' => 'Mobile',
            'type' => 'number'
        ]);

        $this->addColumn('zipCode', [
            'value' => $customer['zipCode'],
            'name' => 'filter[customer][zipCode]',
            'field' => 'zipCode',
            'label' => 'Billing Zip Code',
            'type' => 'number'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $customer['createdDate'],
            'name' => 'filter[customer][createdDate]',
            'label' => 'Created Date',
            'type' => 'datetime'
        ]);

        $this->addColumn('updatedDate', [
            'field' => 'updatedDate',
            'value' => $customer['updatedDate'],
            'name' => 'filter[customer][updatedDate]',
            'label' => 'Updated Date',
            'type' => 'datetime'
        ]);
    }

    public function getStatusUrl($row)
    {
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->customerId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->customerId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->customerId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->customerId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->customerId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->customerId]);
    }
    public function getTitle()
    {
        return 'Manage Customers';
    }

    /**COLLECTION */

    public function prepareCollection()
    {

        $keys = [];
        $values = [];
        $where = null;
        $c = 0;

        /**PAGER CLASS */
        $pager = \Mage::getController('Controller\Core\Pager');
        $customer = \Mage::getModel('Model\customer');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $customer->fetchAll();
        if ($rows) {
            $count = $rows->count();
            $pager->setTotalRecords($count);
        }
        $page = $this->getRequest()->getGet('page');
        $pager->setCurrentPage($page);
        $pager->setRecordsPerPage(5);
        $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
        $pager->calculate();
        $this->setPager($pager);
        /**PAGER CLASS OVER */

        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $customerData = $filterModel->getFilters('customer');

        if ($customerData) {
            $count = count($customerData);
            foreach ($customerData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT c.customerId as `customerId`,
                    cg.name AS `name`,
                    c.firstName,
                    ca.addressType,
                    ca.zipCode,
                    c.mobile,
                    c.lastName,
                    c.email,
                    c.status,
                    c.createdDate,
                    c.updatedDate,
                    ca.zipCode AS `zipCode` 
                    FROM ((customer c LEFT JOIN customer_group cg
                        ON c.groupId=cg.groupId)
                    LEFT JOIN customer_address ca 
                        ON c.customerId=ca.customerId and addressType='billing') ";
                // echo $query;die;
                $collection = $customer->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($customerData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT c.customerId as `customerId`,
                    cg.name AS `name`,
                    c.firstName,
                    c.mobile,
                    ca.addressType,
                    ca.zipCode,
                    c.lastName,
                    c.email,
                    c.status,
                    c.createdDate,
                    c.updatedDate,
                    ca.zipCode AS `zipCode` 
                    FROM ((customer c LEFT JOIN customer_group cg
                        ON c.groupId=cg.groupId)
                    LEFT JOIN customer_address ca 
                        ON c.customerId=ca.customerId and addressType='billing') WHERE ";

            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = $query . " " . $where;

            $collection = $customer->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $customer->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        } else {
            $query =
                "SELECT c.customerId as `customerId`,
                    cg.name AS `name`,
                    c.firstName,
                    ca.addressType,
                    ca.zipCode,
                    c.mobile,
                    c.lastName,
                    c.email,
                    c.status,
                    c.createdDate,
                    c.updatedDate,
                    ca.zipCode AS `zipCode` 
                    FROM ((customer c LEFT JOIN customer_group cg
                        ON c.groupId=cg.groupId)
                    LEFT JOIN customer_address ca 
                        ON c.customerId=ca.customerId and addressType='billing')  
                        LIMIT $startFrom, {$pager->getRecordsPerPage()}";

            $collection = $customer->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
    public function getZipCode()
    {
        $customers = \Mage::getModel('Model\Customer\CustomerAddress');
        $query = "SELECT c.`customerId`,
                        ca.addressType,
                        ca.zipCode
                        FROM 
                        `customer` AS c, `customer_address` AS ca
                        WHERE c.`customerId` = ca.`customerId` AND ca.`addressType` LIKE '%billing' ORDER BY c.`customerId`;";
        $rows = $customers->fetchAll($query);

        $this->customers = $rows;
    }
    public function getCustomerOptions()
    {
        if ($this->customersOptions) {
            return $this->customersOptions;
        }
        $query = "SELECT `groupId`, `name` from cgroup;";
        $customers = \Mage::getModel('Model\customer')->fetchAll($query);
        if ($customers) {
            foreach ($customers->getdata() as $customer) {
                $this->customersOptions[$customer->groupId] = $customer->name;
            }
        }
        return $this->customersOptions;
    }
}
