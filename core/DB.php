<?php
class DB
{
    public $conection;
    protected $severname = 'ec2-54-87-112-29.compute-1.amazonaws.com';
    protected $username = 'vssaktybkwrtbo';
    protected $password = '7397c9cea0d96410dbab9eb399d7059aa1ec894c702bdd7c6ee8bc372b2c682e';
    protected $dbname = 'dak2okj6mu4ut3';

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