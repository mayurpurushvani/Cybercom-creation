<?php

namespace Model\Core;

class Table
{
    protected $primaryKey = null;
    protected $tableName = null;
    public $data = [];
    protected $adapter = null;
    protected $arrayData = [];

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
    public function getTableName()
    {
        return $this->tableName;
    }
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }
    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }
    public function getData()
    {
        return $this->data;
    }



    public function setArrayData(array $key, array $arrayData)
    {
        $this->arrayData = array_combine($key, $arrayData);
        return $this;
    }
    public function getArrayData()
    {
        // echo '<pre>';print_r($this->arrayData);die;
        return $this->arrayData;
    }
    public function setAdapter()
    {
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
        $this->adapter->connection();
        return $this;
    }
    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if (!array_key_exists($key, $this->data)) {
            return null;
        }
        return $this->data[$key];
    }
    public function loadById($value)
    {
        $value = (int)$value;
        $query = "Select * from `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = $value";
        return $this->fetchRow($query);
    }
    public function fetchRow($value)
    {
        $query = "SELECT * FROM `{$this->tableName}` WHERE `{$this->primaryKey}` = $value";
        $row = $this->getAdapter()->displyaRecordById($query);

        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }
    public function fetchRowByQuery($query)
    {
        $row = $this->getAdapter()->displyaRecordById($query);

        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }
    public function select($value = null, $selectId = null)
    {
        if ($selectId == 1) {
            $selectId = 0;
        } else {
            $selectId = 1;
        }
        if ($value == null) {
            if (!array_key_exists($this->getPrimaryKey(), $this->getData())) {
                return false;
            }
            $value = $this->getData();
        }
        $query = "UPDATE `{$this->getTableName()}` SET `status` = $selectId WHERE `{$this->getPrimaryKey()}` = $value ";
        return $this->getAdapter()->select($query);
    }
    public function update($query)
    {
        $row = $this->getAdapter()->update($query);
    }

    public function arrayUpdate($id = null)
    {
        $data = $this->getArrayData();
        foreach ($data as $key => $value) {
            $values = implode(',', $value);
          
            $query = "UPDATE `{$this->getTableName()}` SET $key = '$values' WHERE `{$this->getPrimaryKey()}` = '$id'";
            $this->getAdapter()->update($query);
        }
        return $this;
    }

    public function fetchAll($query = null)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->tableName}`;";
        }
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $key = new $this;
            $key->setData($value);
            $rowArray[] = $key;
        }
        // return $rowArray;
        $collectionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($rowArray);
        unset($rowArray);
        return $collection;
    }

    public function save()
    {

        if (array_key_exists($this->getPrimaryKey(), $this->data)) {
            //update
            $field = array_keys($this->data);
            $value = array_values($this->data);

            $final = null;
            $id = '';
            for ($i = 0; $i < count($field); $i++) {
                if ($field[$i] == $this->getPrimaryKey()) {
                    $id = $value[$i];
                    continue;
                }
                $final = $final . "`" . $field[$i] . "`='" . $value[$i] . "',";
            }
            $final = rtrim($final, ",");
            $query = "UPDATE `{$this->getTableName()}` SET {$final} WHERE `{$this->getPrimaryKey()}` = '{$id}'";
            $adapter = $this->getAdapter();
            $adapter->update($query);
            $this->fetchRow($id);
            return $this;
        } else {
            //insert

            $values = null;
            $fieldName = null;
            foreach (array_keys($this->data) as $value) {
                $fieldName = $fieldName . "`$value`,";
            }

            foreach (array_values($this->data) as $value) {
                $values = $values . "'$value',";
            }
            $fieldName = rtrim($fieldName, ",");
            $values = rtrim($values, ",");
            $query = "INSERT into `{$this->getTableName()}` ({$fieldName}) values ({$values})";
            $adapter = $this->getAdapter();
            $id = $adapter->insert($query);
            $this->fetchRow($id);
            return $this;
        }
    }

    public function delete($value = null)
    {
        if ($value == null) {
            if (!array_key_exists($this->getPrimaryKey(), $this->getData())) {
                return false;
            }
            $value = $this->getData();
        }
        $query = "DELETE FROM `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = $value";
        if ($this->getAdapter()->delete($query)) {
            return true;
        }
        return false;
    }
    public function deleteByQuery($query)
    {
        if ($this->getAdapter()->delete($query)) {
            return true;
        }
        return false;
    }
    public function deleteByArray($value = [])
    {
        if ($value == null) {
            if (!array_key_exists($this->getPrimaryKey(), $this->getData())) {
                return false;
            }
            $value = $this->getData();
        }

        $values = implode(",", $value['deleteId']);
        $query = "DELETE FROM `{$this->getTableName()}` where `{$this->getPrimaryKey()}` IN  ($values)";

        if ($this->getAdapter()->delete($query)) {
            return true;
        }
        return false;
    }
}
