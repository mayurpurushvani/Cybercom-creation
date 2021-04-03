<?php

namespace Block\Admin\Category;

class Grid extends \Block\Core\Grid
{
    protected $categoriesOptions = null;

    public function __construct()
    {
        parent::__construct();
    }
    public function prepareColumns()
    {
        $filterModel = \Mage::getModel('Model\Admin\Filter');
        $category = $filterModel->getFilters('category');

        $this->addColumn('categoryId', [
            'field' => 'categoryId',
            'label' => 'Category Id',
            'value' => $category['categoryId'],
            'name' => 'filter[category][categoryId]',
            'type' => 'number'

        ]);

        $this->addColumn('categoryName', [
            'field' => 'categoryName',
            'value' => $category['categoryName'],
            'name' => 'filter[category][categoryName]',
            'label' => 'Category Name',
            'type' => 'text'
        ]);

        $this->addColumn('createdDate', [
            'value' => $category['createdDate'],
            'name' => 'filter[category][createdDate]',
            'field' => 'createdDate',
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
            'class' => 'btn btn-success btn-sm',
            'className' => 'category'
        ]);

        $this->addAction('delete', [
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-sm',
            'className' => 'category'
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
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->categoryId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->categoryId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->categoryId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->categoryId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->categoryId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->categoryId]);
    }
    public function getTitle()
    {
        return 'Manage Categories';
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
        $categoryData = $filterModel->getFilters('category');


        if ($categoryData) {
            $count = count($categoryData);
            foreach ($categoryData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {
                $query = "SELECT * FROM `category` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
                $collection = $category->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($categoryData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT * FROM `category` WHERE ";
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
            $query = "SELECT * FROM `category` LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $category->fetchAll($query);
            $this->setCollection($collection);
            return $this;
        }
    }

    public function getCategoriesOptions()
    {
        if ($this->categoriesOptions) {
            return $this->categoriesOptions;
        }
        $query = "SELECT `categoryId`, `categoryName` from category;";
        $categories = \Mage::getModel('Model\Category')->fetchAll($query);
        if ($categories) {
            foreach ($categories->getdata() as $category) {
                $this->categoriesOptions[$category->categoryId] = $category->categoryName;
            }
        }
        return $this->categoriesOptions;
    }
    public function getName($category)
    {
        $categoriesData = $this->getCategoriesOptions();
        $path = explode('=', $category->path);
        foreach ($path as &$id) {
            if (array_key_exists($id, $categoriesData)) {
                $id = $categoriesData[$id];
            }
        }
        return implode('=>', $path);
    }
}
