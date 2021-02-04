<?php


$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'practice';

class ServerException extends Exception
{
    public function showSpecific()
    {
        return 'Error thrown on line ' . $this->getLine() . ' in ' . $this->getFile();
    }
}

class DatabaseException extends Exception
{
    public function showSpecific()
    {
        return 'Error thrown on line ' . $this->getLine() . ' in ' . $this->getFile();
    }
}

try {
    $con = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
    if (!$con) {
        throw new ServerException();
    } else if (!@mysqli_select_db($con, $mysql_db)) {
        throw new DatabaseException();
    } else {
        echo 'Connected!';
    }
} catch (ServerException $se) {
    echo $se->showSpecific();
} catch (DatabaseException $de) {
    echo $de->showSpecific();
}
?>