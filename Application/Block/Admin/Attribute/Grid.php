<?php

namespace Block\Admin\Attribute;

\mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
    }
    public function prepareColumns()
    {

        // session_start();session_unset();session_destroy();
        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $attribute = $filterModel->getFilters('attribute');

        $this->addColumn('attributeId', [
            'field' => 'attributeId',
            'label' => 'Attribute Id',
            'value' => $attribute['attributeId'],
            'name' => 'filter[attribute][attributeId]',
            'type' => 'number'
        ]);

        $this->addColumn('entityTypeId', [
            'field' => 'entityTypeId',
            'label' => 'Entitytype Id',
            'value' => $attribute['entityTypeId'],
            'name' => 'filter[attribute][entityTypeId]',
            'type' => 'number'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'value' => $attribute['name'],
            'name' => 'filter[attribute][name]',
            'type' => 'text'
        ]);

        $this->addColumn('code', [
            'field' => 'code',
            'label' => 'code',
            'value' => $attribute['code'],
            'name' => 'filter[attribute][code]',
            'type' => 'text'
        ]);

        $this->addColumn('inputType', [
            'field' => 'inputType',
            'value' => $attribute['inputType'],
            'name' => 'filter[attribute][inputType]',
            'label' => 'Input Type',
            'type' => 'text'
        ]);

        $this->addColumn('backendType', [
            'field' => 'backendType',
            'label' => 'Backend Type',
            'value' => $attribute['backendType'],
            'name' => 'filter[attribute][backendType]',
            'type' => 'text'
        ]);

        $this->addColumn('sortOrder', [
            'field' => 'sortOrder',
            'label' => 'Sort Order',
            'value' => $attribute['sortOrder'],
            'name' => 'filter[attribute][sortOrder]',
            'type' => 'number'
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

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->attributeId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->attributeId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->attributeId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->attributeId]);
    }
    public function getTitle()
    {
        return 'Manage Attributes';
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
        $attribute = \Mage::getModel('Model\Attribute');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $attribute->fetchAll();
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
        $attributeData = $filterModel->getFilters('attribute');

        if ($attributeData) {
            $count = count($attributeData);
            foreach ($attributeData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `attribute` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $attribute->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($attributeData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `attribute` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $attribute->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $attribute->fetchAll($sql);
            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT * FROM `attribute` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $attribute->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
