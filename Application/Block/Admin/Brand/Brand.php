<?php

namespace Block\Admin\Brand;

\Mage::loadFileByClassName('Block\Core\Template');
class Brand extends \Block\Core\Template
{

    protected $image = null;
    protected $brand = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Brand/Brand.php');
    }

    public function setBrand($brand = null)
    {
        if ($this->brand) {
            $this->brand = $brand;
            return $this;
        }
        $image = \Mage::getModel('Model\Brand');
        $brand = $image->fetchAll();
        $this->brand = $brand;
        return $this;
    }
    public function getBrand()
    {
        if (!$this->brand) {
            $this->setBrand();
        }
        return $this->brand;
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('saveimage');
    }
}
