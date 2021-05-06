<?php
class checkout extends Controller
{
    public $cart_model;
    public $checkout_model;
    public $user;
    public function __construct()
    {
        $this->cart_model       = $this->model("CartModel");
        $this->checkout_model   = $this->model("CheckOutModel");
        $this->user             = $_SESSION['username'];
    }
    public function default()
    {
        $cartItem   = $this->cart_model->getCartItemByUser($this->user);
        $this->view("master1",[
            "page"       =>"checkout",
            "checkout"   => json_decode($cartItem)
        ]);
    }
    public function addOrder()
    {   
        if(isset($_POST['checkout'])){
            $order_item   = $this->cart_model->getCartItemByUser($this->user);
            $order_detail = json_encode([$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['zip']]);

            $order_id = $this->checkout_model->addOrderItem($this->user,$order_item,$order_detail);
            Header("Location:".$this->getDomain()."/checkout/orderReceived?order_id=".$order_id['order_id']);
        }
        
    }
    public function orderReceived()
    {   
        $order_id = $this->getParamUrl("order_id");
        $order_data = $this->checkout_model->getOderDataById($order_id);
        $this->view("master1",[
            "page"       =>"order-received",
            "order_data" => $order_data
        ]);
    }
}
?>