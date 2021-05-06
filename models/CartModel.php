<?php
class CartModel extends DB
{
    public $result_query = 0;
    public function addToCart($product_id,$user,$quatity)
    {   
        $query  = "SELECT user,product_id,quantity FROM cart";
        $cart_item_per_user = mysqli_query($this->conection,$query);
        $cart_item_per_user = mysqli_fetch_all($cart_item_per_user);
        $cart_item_exit = false;
        foreach($cart_item_per_user as $k=>$v){
            if($v[0] == $user && $v[1] == $product_id){
                $cart_item_exit     = true;
                $current_quantity   = $v[2];
            }
        }
        if($cart_item_exit == true){
            $query  = "UPDATE cart SET quantity=".($current_quantity + $quatity)." WHERE user='".$user."' AND product_id=".$product_id."";
        }else{
            $query  = "INSERT INTO cart (product_id,user,quantity) VALUES (".$product_id.",'".$user."',".$quatity." )";
        }
        if(mysqli_query($this->conection,$query)){
            $this->result_query = 1;
        }
        return $this->result_query;
    }
    public function getCartItemByUser($user)
    {
        $query  =  "SELECT product_id,name,image,price,quantity FROM cart,products WHERE cart.product_id = products.id AND user = '".$user."'";
        $this->result_query = mysqli_query($this->conection,$query);
        $this->result_query = json_encode(mysqli_fetch_all($this->result_query));
        
        return $this->result_query;
    }
    public function removeCart($product_id)
    {
        $query = "DELETE FROM cart WHERE product_id=".$product_id."";
        if(mysqli_query($this->conection,$query)){
            $this->result_query = 1;
        }
        return $this->result_query;
    }
}
?>