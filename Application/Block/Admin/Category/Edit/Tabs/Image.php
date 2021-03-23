<?php

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
class Image extends \Block\Core\Template
{

    protected $image = null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/Edit/Tabs/Image.php');
    }

    public function setImage($image = null)
    {
        if ($this->image) {
            $this->image = $image;
            return $this;
        }
        $image = \Mage::getModel('Model\Category\image');
        $categoryId = $this->getRequest()->getGet('editId');

        if ($categoryId) {
            $query = 'SELECT `imageId` from category_image WHERE categoryId = ' . $categoryId;
            $imageArray = $image->fetchRowByQuery($query);
            if ($imageArray) {
                $image = $image->fetchAll();
            } else {
                return false;
            }
        }
        $this->image = $image;
        return $this;
    }
    public function getImage()
    {
        if (!$this->image) {
            $this->setImage();
        }
        return $this->image;
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('saveImage');
    }
}
