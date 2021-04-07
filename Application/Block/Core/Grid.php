<?php

namespace Block\Core;

use PDO;

class Grid extends \Block\Core\Template
{
    protected $collection = [];
    protected $columns = [];
    protected $actions = [];
    protected $buttons = [];
    protected $status = [];
    protected $filters = [];
    protected $pager = [];

    public function __construct()
    {
        $this->setTemplate('View/Core/Grid.php');
        $this->prepareActions();
        $this->prepareColumns();
        $this->prepareButtons();
        $this->prepareCollection();
        $this->prepareFilterAction();
    }

    public function getPager()
    {
        return $this->pager;
    }

    public function setPager($pager)
    {
        if (!$pager) {
            return \Mage::getController('Controller\Core\Pager');
        }
        $this->pager = $pager;
        return $this;
    }

    public function prepareFilterAction()
    {
        $this->addFilter('filteration', [
            'label' => 'Apply Filter',
            'method' => 'getFilterUrl',
            'type' => 'text',
            'class' => 'btn btn-primary btn-lg',
            'ajax' => true,
        ]);
    }

    public function prepareColumns()
    {
        return $this;
    }

    public function prepareCollection()
    {
        return $this;
    }

    /**COLUMN */
    public function addColumn($key, $value)
    {
        $this->columns[$key] = $value;
        return $this;
    }
    public function getColumns()
    {
        return $this->columns;
    }
    public function getFieldValue($row, $field)
    {
        return $row->$field;
    }

    /**FILTERATION */
    public function addFilter($key, $value)
    {
        $this->filters[$key] = $value;
        return $this;
    }
    public function getFilter()
    {
        return $this->filters;
    }

    /**ACTION */
    public function getActions()
    {
        return $this->actions;
    }
    public function addAction($key, $value)
    {
        $this->actions[$key] = $value;
        return $this;
    }

    public function getMethodUrl($row, $method)
    {
        return $this->$method($row);
    }

    public function addStatus($key, $value)
    {
        $this->status[$key] = $value;
        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }

    /**BUTTONS */
    public function getButtons()
    {
        return $this->buttons;
    }
    public function addButtons($key, $value)
    {
        $this->buttons[$key] = $value;
        return $this;
    }
    public function getAddNewUrl()
    {
        $url = $this->getUrl()->getUrl('form', null, [], true);
        return "object.setUrl('{$url}').resetParams().load()";
    }
    public function getButtonUrl($method)
    {
        return $this->$method;
    }
    public function prepareButtons()
    {
        $this->addButtons('addnew', [
            'label' => 'Add New',
            'method' => 'getAddNewUrl',
            'ajax' => true,
            'class' => 'btn btn-primary btn-lg'
        ]);
    }
    /**COLLECTIONS */
    public function setCollection($collection = null)
    {
        $this->collection = $collection;
        return $this;
    }
    public function getCollection()
    {
        if (!$this->collection) {
            $this->setCollection();
        }
        return $this->collection;
    }

    public function prepareActions()
    {
        $this->addAction('edit', [
            'label' => 'Edit',
            'method' => 'getEditUrl',
            'ajax' => true,
            'class' => 'btn btn-success btn-lg'
        ]);

        $this->addAction('delete', [
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-lg'
        ]);
    }
    public function prepareStatus()
    {
        $this->addStatus('1', [
            'label' => 'Active',
            'method' => 'getStatusUrl',
            'ajax' => true,
            'class' => 'btn btn-success btn-lg',
            'title' => 'Active',
            'id' => 'activeBtn'
        ]);

        $this->addStatus('0', [
            'label' => 'InActive',
            'method' => 'getStatusUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-lg',
            'title' => 'InActive',
            'id' => 'activeBtn'
        ]);
    }

}
