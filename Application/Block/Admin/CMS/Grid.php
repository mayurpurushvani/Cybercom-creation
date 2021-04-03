<?php

namespace Block\Admin\CMS;

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
    }
    public function prepareColumns()
    {
        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $CMS = $filterModel->getFilters('CMS');

        $this->addColumn('pageId', [
            'field' => 'pageId',
            'value' => $CMS['pageId'],
            'name' => 'filter[CMS][pageId]',
            'label' => 'Page Id',
            'type' => 'number'
        ]);

        $this->addColumn('title', [
            'field' => 'title',
            'value' => $CMS['title'],
            'name' => 'filter[CMS][title]',
            'label' => 'Title',
            'type' => 'text'
        ]);

        $this->addColumn('identifier', [
            'field' => 'identifier',
            'value' => $CMS['identifier'],
            'name' => 'filter[CMS][identifier]',
            'label' => 'Identifier',
            'type' => 'number'
        ]);

        $this->addColumn('content', [
            'field' => 'content',
            'value' => $CMS['content'],
            'name' => 'filter[CMS][content]',
            'label' => 'Content',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $CMS['createdDate'],
            'name' => 'filter[CMS][createdDate]',
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
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->pageId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->pageId]);
    }
    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->pageId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->pageId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->pageId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->pageId]);
    }
    public function getTitle()
    {
        return 'Manage CMS';
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
        $category = \Mage::getModel('Model\Category');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $category->fetchAll();
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
        $CMSData = $filterModel->getFilters('CMS');


        if ($CMSData) {
            $count = count($CMSData);
            foreach ($CMSData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `cms_page` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $category->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($CMSData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `cms_page` WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $category->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $category->fetchAll($sql);

            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT * FROM `cms_page` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $category->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }
}
