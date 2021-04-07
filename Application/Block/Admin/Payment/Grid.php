<?php

namespace Block\Admin\Payment;

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareStatus();

    }
    public function prepareColumns()
    {

        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $payment = $filterModel->getFilters('payment');


        $this->addColumn('methodId', [
            'field' => 'methodId',
            'value' => $payment['methodId'],
            'name' => 'filter[payment][methodId]',
            'label' => 'Method Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'value' => $payment['name'],
            'name' => 'filter[payment][name]',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('code', [
            'value' => $payment['code'],
            'name' => 'filter[payment][code]',
            'field' => 'code',
            'label' => 'Code',
            'type' => 'number'
        ]);

        $this->addColumn('description', [
            'value' => $payment['description'],
            'name' => 'filter[payment][description]',
            'field' => 'description',
            'label' => 'Description',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'value' => $payment['createdDate'],
            'name' => 'filter[payment][createdDate]',
            'field' => 'createdDate',
            'label' => 'Created Date',
            'type' => 'datetime'
        ]);
    }

    public function getStatusUrl($row)
    {
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->methodId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->methodId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->methodId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->methodId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->methodId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->methodId]);
    }
    public function getTitle()
    {
        return 'Manage Payments';
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
        $payment = \Mage::getModel('Model\Payment');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $payment->fetchAll();
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
        $paymentData = $filterModel->getFilters('payment');


        if ($paymentData) {
            $count = count($paymentData);
            foreach ($paymentData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `payment` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $payment->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($paymentData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `payment` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $payment->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $payment->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT * FROM `payment` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $payment->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
