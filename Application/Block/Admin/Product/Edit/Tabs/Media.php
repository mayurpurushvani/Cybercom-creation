<?php

namespace Block\Admin\Product\Edit\Tabs;

class Media extends \Block\Core\Template {

    protected $media = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/Media.php');   
    }

    public function setMedia($media = null)
    {
        if ($this->media) {
            $this->media = $media;
            return $this;
        }
        $media = \Mage::getModel('Model\Product\Media');
        $productId = $this->getRequest()->getGet('editId');

        if ($productId) {
            $query = 'SELECT mediaId from media WHERE productId = ' . $productId;
            $mediaArray = $media->fetchRowByQuery($query);
            if ($mediaArray) {
                $media = $media->fetchAll();
            }
            else {
                return false;
            }
        }
        $this->media = $media;
        return $this;
    }
    public function getMedia()
    {
        if(!$this->media) {
            $this->setMedia();
        }
        return $this->media;
    }
    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('saveMedia');
    }   
}