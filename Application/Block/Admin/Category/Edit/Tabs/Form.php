<?php

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Form extends \Block\Core\Template
{
    protected $category = null;
    protected $categoryOptions = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Admin/Category/Edit/Tabs/Form.php');
    }


    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {

            $query = "SELECT `categoryId`, `name` FROM `{$this->getCategory()->getTableName()}`;";
           

            $options = $this->getCategory()->getAdapter()->fetchPairs($query);

            if (!$this->getTableRow()->categoryId) {
                $query = "SELECT `categoryId`, `path` FROM `{$this->getCategory()->getTableName()}` ORDER BY `path` ASC ;";
            } else {
                $query = "SELECT `categoryId`, `path` FROM `{$this->getCategory()->getTableName()}` WHERE `path` NOT LIKE '{$this->getCategory()->path}%'  ORDER BY `path` ASC ;";
            }

            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);

            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$path) {
                    $pathIds = explode("=", $path);
                    foreach ($pathIds as $key => &$id) {
                        if (array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $path = implode("/", $pathIds);
                }
            }
            $this->categoryOptions = ["" => "Select"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }

    public function setCategory($category = null)
    {
        if ($category) {
            $this->category = $category;
            return $this;
        }
        $category = \Mage::getModel('Model\Category');
        $id = $this->getTableRow()->categoryId;
        if ($id) {
            $category = $category->fetchRow($id);
        }
        $this->category = $category;

        return $this;
    }
    public function getCategory()
    {
        if (!$this->category) {
            $this->setCategory();
        }
        return $this->category;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
    public function getTitle()
    {
        return 'category Add/Edit';
    }
}
