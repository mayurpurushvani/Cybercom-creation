<?php

namespace Model\Core;

use mysqli;

class Adapter
{
    private $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'application'
    ];

    private $connect = null;
    public $final = [];

    public function connection()
    {
        $connect = new \mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
        $this->setConnect($connect);
    }
    public function getConnect()
    {
        return $this->connect;
    }
    public function setConnect(\mysqli $connect)
    {
        $this->connect = $connect;
        return $this;
    }
    public function isConnected()
    {
        if (!$this->getConnect()) {
            echo 'Not connected!';
            return false;
        } else {
            return true;
        }
    }
    public function fetchRow($query)
    {
        if ($this->isConnected() == false) {
            echo 'Connection failed!';
        } else {

            $result = mysqli_query($this->getConnect(), $query);
            $row = mysqli_fetch_row($result);  //fetch_row - Return the rows
            if (!$row) {
            } else {
                foreach ($row as $key => $value) {
                    $value = $value;
                    $final[] = $value;
                }
                return $final;
            }
        }
    }
    public function fetchAll($query)
    {

        $this->$query = $query;
        if ($this->isConnected() == false) {
            echo 'Connection failed!';
        } else {
            $result = mysqli_query($this->getConnect(), $query);

            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);  //fetch_all - Return all the rows   
            return $row;
            // if (!$row) {
            // } else {
            // foreach ($row as $key => $value) {
            // $categoryValue = $value;
            // $categoryKey = $key;
            // $final[$categoryKey] = $categoryValue;
            // }
            // return $final;
            // }
        }
    }
    public function fetchPairs($query)
    {

        $this->$query = $query;
        if ($this->isConnected() == false) {
            echo 'Connection failed!';
        }
        $res = $this->getConnect()->query($query);
        $rows = $res->fetch_all();
        if (!$rows) {
            return $rows;
        }
        $columns = array_column($rows, '0');
        $values = array_column($rows, '1');
        return array_combine($columns, $values);
    }
    public function login($query)
    {
        if (mysqli_query($this->connection(), $query)) {
            $row = mysqli_fetch_array(mysqli_query($this->connection, $query));
            if ($row['adminId'] == "") {
                return false;
            } else {
                session_start();
                $_SESSION['admin'] = $row['userName'];
                $_SESSION['adminId'] = $row['adminId'];
                return true;
            }
        }
    }

    // public function insert($query, $post = NULL)
    // {
    //     $this->$query = $query;

    //     if ($this->isConnected() == false) {
    //         return false;
    //     } else {
    //         $result = mysqli_query($this->getConnect(), $query);
    //         if($result) {
    //             $last_id = mysqli_insert_id($this->getConnect());
    //             return $last_id;
    //         }
    //     }
    // }
    public function insert($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = mysqli_query($this->getConnect(), $query);
        if ($result) {
            return mysqli_insert_id($this->getConnect());
        } else {
            return false;
        }
    }
    public function delete($query, $id = null)
    {
        $this->$query = $query;

        if ($this->isConnected() == false) {
            echo 'Connection failed!';
        } else {
            $sql = mysqli_query($this->getConnect(), $query);
            if ($sql) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function select($query)
    {
        $sql = mysqli_query($this->getConnect(), $query);
    }
    public function selectTableColumn($query)
    {
        $columns = mysqli_query($this->getConnect(), $query);
        if ($columns) {
            if ($columns->num_rows > 0) {
                $result = $columns->fetch_all();
                // print_r($result);
                return $result;
            }
        }
        return false;
    }

    public function displyaRecordById($query = null, $id = NULL)
    {
        $this->$query = $query;
        $result =  mysqli_query($this->getConnect(), $query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            }
        }
        return false;
    }
    public function update($query, $editId = NULL)
    {
        $this->$query = $query;
        if ($this->isConnected() == false) {
            echo 'Connection failed!';
        } else {
            $sql = mysqli_query($this->getConnect(), $query);
            if ($sql) {
            } else {
                echo "Record does not update try again";
            }
        }
    }
}
