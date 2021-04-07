<?php

namespace Block\Admin\Product;

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
        $product = $filterModel->getFilters('product');

        $this->addColumn('productId', [
            'field' => 'productId',
            'value' => $product['productId'],
            'name' => 'filter[product][productId]',
            'label' => 'Product Id',
            'type' => 'number'
        ]);


        $this->addColumn('brandName', [
            'field' => 'brandName',
            'value' => $product['brandName'],
            'name' => 'filter[product][brandName]',
            'label' => 'Brand Name',
            'type' => 'text'
        ]);

        $this->addColumn('sku', [
            'field' => 'sku',
            'value' => $product['sku'],
            'name' => 'filter[product][sku]',
            'label' => 'SKU',
            'type' => 'datetime'
        ]);

        $this->addColumn('name', [
            'field' => 'name',
            'value' => $product['name'],
            'name' => 'filter[product][name]',

            'label' => 'Product Name',
            'type' => 'text'
        ]);

        $this->addColumn('price', [
            'field' => 'price',
            'value' => $product['price'],
            'name' => 'filter[product][price]',

            'label' => 'Product Price (₹)',
            'type' => 'decimal(10,2)'
        ]);

        $this->addColumn('discount', [
            'value' => $product['discount'],
            'name' => 'filter[product][discount]',

            'field' => 'discount',
            'label' => 'Discount (₹)',
            'type' => 'decimal(10,2)'
        ]);

        $this->addColumn('quantity', [
            'field' => 'quantity',
            'value' => $product['quantity'],
            'name' => 'filter[product][quantity]',

            'label' => 'Quantity',
            'type' => 'bigint(11)'
        ]);

        $this->addColumn('createdDate', [
            'field' => 'createdDate',
            'value' => $product['createdDate'],
            'name' => 'filter[product][createdDate]',

            'label' => 'Created Date',
            'type' => 'datetime'
        ]);

        $this->addColumn('updatedDate', [
            'field' => 'updatedDate',
            'value' => $product['updatedDate'],
            'name' => 'filter[product][updatedDate]',

            'label' => 'Updated Date',
            'type' => 'datetime'
        ]);
    }

    public function prepareActions()
    {
        $this->addAction('edit', [
            'label' => 'Edit',
            'method' => 'getEditUrl',
            'ajax' => true,
            'class' => 'btn btn-success btn-md'
        ]);

        $this->addAction('delete', [
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'ajax' => true,
            'class' => 'btn btn-danger btn-md'
        ]);

        $this->addAction('addToCart', [
            'label' => 'Add to cart',
            'method' => 'getCartUrl',
            'ajax' => true,
            'class' => 'btn btn-primary btn-md'
        ]);
    
    }


    public function getStatusUrl($row)
    {
        $url = $this->getUrl()->getUrl('select', null, ['selectId' => $row->status, 'editId' => $row->productId]);
        return "object.setUrl('{$url}').load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->productId]);
    }

    public function getEditUrl($row)
    {
        $url = $this->getUrl()->getUrl('form', null, ['editId' => $row->productId]);
        return "object.setUrl('{$url}').resetParams().load()";
        // return $this->getUrl()->getUrl('form', null, ['editId'=>$row->productId]);
    }
    public function getDeleteUrl($row)
    {
        $url = $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->productId]);
        return "object.setUrl('{$url}').resetParams().load()";
        //return $this->getUrl()->getUrl('delete', null, ['deleteId' => $row->productId]);
    }

    public function getCartUrl($row)
    {
        $url = $this->getUrl()->getUrl('addTocart', 'Admin\Cart', ['editId' => $row->productId], true);
        return "object.setUrl('{$url}').resetParams().load()";
    }

    public function getTitle()
    {
        return 'Manage Products';
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
        $product = \Mage::getModel('Model\Product');
        $grid = \Mage::getBlock('Block\Core\Grid');
        $rows = $product->fetchAll();
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
        $productData = $filterModel->getFilters('product');


        if ($productData) {
            $count = count($productData);
            foreach ($productData as $key => $value) {
                if ($value == '') {
                    $c++;
                }
            }
            if ($count == $c) {

                $query = "SELECT p.*,b.brandName as `brandName` 
                from product p 
                join brand b 
                    on p.brandId=b.brandId
                LIMIT $startFrom, {$pager->getRecordsPerPage()}";

                $collection = $product->fetchAll($query);
                $this->setCollection($collection);
                return $this;
            }
            foreach ($productData as $key => $value) {
                if ($value != "") {
                    $keys[] = $key;
                    $values[] = $value;
                }
            }
            $filter = array_combine($keys, $values);
            $query = "SELECT p.*,b.brandName as `brandName` 
                from product p 
                join brand b 
                    on p.brandId=b.brandId WHERE ";
            foreach ($filter as $key => $value) {
                $where .= $key . " = '" . $value . "' AND ";
            }

            $where = substr($where, 0, -4);
            $sql = "$query $where";

            $collection = $product->fetchAll($sql);
            $count = $collection->count();
            $pager->setTotalRecords($count);

            $startFrom = ($pager->getCurrentPage() - 1) * ($pager->getRecordsPerPage());
            $pager->calculate();

            $sql = "$query $where LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collections = $product->fetchAll($sql);

            $this->setCollection($collections);
            return $this;
        } else {
            $query = "SELECT p.*,b.brandName as `brandName` 
                from product p 
                join brand b 
                    on p.brandId=b.brandId
                LIMIT $startFrom, {$pager->getRecordsPerPage()}";
            $collection = $product->fetchAll($query);

            $this->setCollection($collection);
            return $this;
        }
    }
   
}
