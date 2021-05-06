<?php
class CheckOutModel extends DB
{
    private $result_query = "";
    public function addOrderItem($user,$order_item,$order_detail)
    {   
        $time  = date("Y/m/d");
        $query = "INSERT INTO orders (user,order_item,order_detail,status,time) VALUES ('".$user."','".$order_item."','".$order_detail."','New','".$time."')";
        if(mysqli_query($this->conection,$query)){
            $this->removeItemCart($user);
            $query = "SELECT max(order_id) AS order_id FROM orders WHERE user='".$user."'";
            $this->result_query = $this->queryDatabaseAssoc($query);
        }
        return $this->result_query;
    }
    public function getOderDataById($order_id)
    {   
        $query = "SELECT * FROM orders WHERE order_id=".$order_id."";
        $this->result_query = $this->queryDatabaseAssoc($query);
        return $this->result_query;
    }
    private function removeItemCart($user)
    {
        $query = "DELETE FROM cart WHERE user='".$user."'";
        mysqli_query($this->conection,$query);
    }
    public function getAllOder()
    {
        $query = "SELECT * FROM orders ";
        $this->result_query = mysqli_fetch_all(mysqli_query($this->conection, $query));
        return $this->result_query;
    }
    public function getOrderbyId($order_id)
    {   
        $query = "SELECT * FROM orders WHERE order_id=".$order_id."";
        $this->result_query = $this->queryDatabaseAssoc($query);
        return $this->result_query;
    }
    public function updateStatusOrder($order_id,$status_order)
    {
        $query = "UPDATE orders SET status = '".$status_order."' WHERE order_id=".$order_id."";
        if(mysqli_query($this->conection, $query)){
            $this->result_query = 1;
        }
        return  $this->result_query;
    }
}
?>