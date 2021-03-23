<?php

namespace Block\Admin\Shipment;

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
        $shipment = $filterModel->getFilters('shipment');


        $this->addColumn('methodId', [
            'value' => $shipment['methodId'],
            'name' => 'filter[shipment][methodId]',
            'field' => 'methodId',
            'label' => 'Method Id',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'value' => $shipment['name'],
            'name' => 'filter[shipment][name]',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('code', [
            'field' => 'code',
            'value' => $shipment['code'],
            'name' => 'filter[shipment][code]',
            'label' => 'Code',
            'type' => 'number'
        ]);

        $this->addColumn('amount', [
            'value' => $shipment['amount'],
            'name' => 'filter[shipment][amount]',
            'field' => 'amount',
            'label' => 'Amount',
            'type' => 'number'
        ]);

        $this->addColumn('description', [
            'field' => 'description',
            'value' => $shipment['description'],
            'name' => 'filter[shipment][description]',
            'label' => 'Description',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $shipment['createdDate'],
            'name' => 'filter[shipment][createdDate]',
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
        return 'Manage Shipments';
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
        $shipment = \Mage::getModel('Model\shipment');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $shipment->fetchAll();
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
        $shipmentData = $filterModel->getFilters('shipment');


        if ($shipmentData) {
            $count = count($shipmentData);
            foreach ($shipmentData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `shipment` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $shipment->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($shipmentData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `shipment` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $shipment->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $shipment->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT * FROM `shipment` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $shipment->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
