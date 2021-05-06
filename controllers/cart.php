<?php
class cart extends Controller
{
    public $cart_model;
    public function __construct()
    {
        $this->cart_model = $this->model("CartModel");
    }
    public function default()
    {   
        $user       = $_SESSION['username'];
        $cartItem   = $this->cart_model->getCartItemByUser($user);
        $this->view("master1",[
            "page"       =>"cart",
            "cart_item"   => json_decode($cartItem)
        ]);
    }
    public function addToCart()
    {
        $product_id = $_POST['product_id'];
        $user       = $_POST['user'];
        $quatity    = $_POST['quatity'];

        $result     = $this->cart_model->addToCart($product_id,$user,$quatity);
        echo $result;
    }
    public function removeCart()
    {
        $product_id = $_POST['product_id'];
        $result     = $this->cart_model->removeCart($product_id);
        echo $result;
    }
}
?>