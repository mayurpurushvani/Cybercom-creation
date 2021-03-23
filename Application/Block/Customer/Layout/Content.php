<?php

namespace Block\Customer\Layout;

\mage::getBlock('Block\Core\Template');
class Content extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('View/Customer/Layout/Content.php');
    }
    public function getCategoryBanner()
    {
        $category =  \Mage::getModel('Model\Category\Image');
        $query = "SELECT `image` from `category_image`";
        $collection = $category->fetchAll($query);
        if ($collection) {
            foreach ($collection->getData() as $key => $value) {
                $categories[] = $value->image;
            }
            return $categories;
        }
        return null;
    }
}
