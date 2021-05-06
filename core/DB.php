<?php
class DB
{
    public $conection;
    protected $severname = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'mvc';

    function __construct()
    {
        $this->conection = mysqli_connect($this->severname,$this->username,$this->password);
        mysqli_select_db($this->conection,$this->dbname);
        mysqli_query($this->conection, "SET NAMES 'utf8' ");
    }
    public function queryDatabaseAssoc($query)
    {
        $product_data_obj   = mysqli_query($this->conection, $query);
        $product_data       = mysqli_fetch_assoc($product_data_obj);
        return $product_data;
    }
}
?>