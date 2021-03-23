<?php

namespace Block\Admin\CustomerGroup;

\mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
    }
    public function prepareColumns()
    {
        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $customerGroup = $filterModel->getFilters('customer_group');

        $this->addColumn('groupId', [
            'field' => 'groupId',
            'value' => $customerGroup['groupId'],
            'name' => 'filter[customer_group][groupId]',
            'label' => 'group Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'value' => $customerGroup['name'],
            'name' => 'filter[customer_group][name]',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $customerGroup['createdDate'],
            'name' => 'filter[customer_group][createdDate]',
            'label' => 'Created Date',
            'type' => 'datetime'
        ]);
    }

    public function prepareActions()
    {
        $this->addAction('edit', [
            'label' => 'Edit',
            'method' => 'getEditUrl',
            'ajax' => true,
            'class' => 'btn btn-success btn-sm'
        ]);

        $this->addAction('delete', [
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-sm'
        ]);
    }

    public function prepareStatus()
    {
        $this->addStatus('1', [
            'label' => 'Active',
            'method' => 'getStatusUrl',
            'ajax' => true,
            'class' => 'btn btn-success btn-sm',
            'title' => 'Active',
            'id' => 'activeBtn'
        ]);

        $this->addStatus('0', [
            'label' => 'InActive',
            'method' => 'getStatusUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-sm',
            'title' => 'InActive',
            'id' => 'activeBtn'
        ]);
    }


    public function getStatusUrl($row)
    {
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->groupId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->groupId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->groupId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->groupId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->groupId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->groupId]);
    }
    public function getTitle()
    {
        return 'Manage Customer Groups';
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
        $customer_group = \Mage::getModel('Model\customerGroup');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $customer_group->fetchAll();
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
        $customer_groupData = $filterModel->getFilters('customer_group');


        if ($customer_groupData) {
            $count = count($customer_groupData);
            foreach ($customer_groupData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `customer_group` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $customer_group->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($customer_groupData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `customer_group` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $customer_group->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $customer_group->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT * FROM `customer_group` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $customer_group->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
