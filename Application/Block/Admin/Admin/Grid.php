<?php

namespace Block\Admin\Admin;

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
        // session_unset();
        // session_destroy();

        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $admin = $filterModel->getFilters('adminTable');

        $this->addColumn('adminId', [
            'field' => 'adminId',
            'label' => 'Admin Id',
            'value' => $admin['adminId'],
            'name' => 'filter[adminTable][adminId]',
            'type' => 'number'
        ]);

        $this->addColumn('userName', [
            'field' => 'userName',
            'label' => 'userName',
            'value' => $admin['userName'],
            'name' => 'filter[adminTable][userName]',
            'type' => 'text'
        ]);

        // $this->addColumn('password', [
        //     'field' => 'password',
        //     'label' => 'Password',
        //     'value' => $admin['password'],
        //     'name' => 'filter[adminTable][password]',
        //     'type' => 'text'
        // ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $admin['createdDate'],
            'name' => 'filter[adminTable][createdDate]',
            'label' => 'Created Date',
            'type' => 'datetime'
        ]);
    }


   

    public function getStatusUrl($row)
    {
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->adminId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->adminId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->adminId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->adminId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->adminId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->adminId]);
    }
    public function getTitle()
    {
        return 'Manage Admins';
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
        $admin = \Mage::getModel('Model\Admin');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $admin->fetchAll();
        $count = $rows->count();
        $pager->setTotalRecords($count);
        $page = $this->getRequest()->getGet('page');
        $pager->setCurrentPage($page);
        $pager->setRecordsPerPage(5);
        $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
        $pager->calculate();
        $this->setPager($pager);
        /**PAGER CLASS OVER */


        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $adminData = $filterModel->getFilters('adminTable');


        if ($adminData) {
            $count = count($adminData);
            foreach ($adminData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `admin` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $admin->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($adminData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `admin` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $admin->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $admin->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        }  else {
            $query = "SELECT * FROM `admin` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $admin->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
