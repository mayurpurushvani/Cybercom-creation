<?php

namespace Model\Core;
class Collection {
    
    public $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }
    public function countData()
    {
        return count($this->data);
    }
}

?>