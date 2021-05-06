<?php 
class myaccount extends Controller
{
    public $check_out_model;
    protected $user;
    public function __construct()
    {
        $this->check_out_model =  $this->model("CheckOutModel");
        $this->user  = $_SESSION['username'];
    }
    public function default(){
        if($_SESSION["username"] === "admin"){
            $this->view('masteradmin');
        }else{
            $user_data = $this->model('UserModel')->getInforByUser($this->user);
            $this->view('master1',[
                "page"=>'myaccount',
                "user_data" => $user_data
            ]);
        }
    }
    public function product(){
        $param          = $this->getParamUrl('action');
        $productModel   = $this->model("ProductModel");
        $product_per_page = 6;
        $current_page   = empty($this->getParamUrl('page')) ? 1 : $this->getParamUrl('page');
        $total_product  = $productModel->getTotalProductFromDatabase();
        $tolal_page     = ceil($total_product/$product_per_page);
        $productList    = json_decode($productModel->getAllProductFromDatabase($current_page,$product_per_page));
        switch ($param) {
            case 'addnew':
                $this->view('masteradmin',[
                    "page" => "addnewproduct"
                ]);
                break;

            case 'viewall':
                $this->view('masteradmin',[
                    "page" => "viewallproduct",
                    "tolal_page" => $tolal_page,
                    "current_page" => $current_page,
                    "product_list" => $productList                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                ]);
                break;
        }
    }
    public function order()
    {
        $order_data = $this->check_out_model->getAllOder();
        $this->view('masteradmin',[
            "page" => "order",
            "order_data" => $order_data
        ]);
    }
    public function editOrder()
    {   
        $order_id      = $this->getParamUrl('order_id');
        $order_data    = $this->check_out_model->getOrderbyId($order_id);
        $this->view('masteradmin',[
            "page" => "edit-order",
            "order_data" => $order_data
        ]);
    }
    public function updateOrder()
    {
        $order_id = $_POST['order_id'];
        $status_order = $_POST['status_order'];
        $result_query = $this->check_out_model->updateStatusOrder($order_id,$status_order);

        if($result_query == 1){
            Header("Location:".$this->getDomain()."/myaccount/editOrder?order_id=".$order_id);
        }
    }
    public function updateUser()
    {   
        $phonenumber        = $_POST['phonenumber'];
        $email              = $_POST['email'];
        $address            = $_POST['address'];
        if($_POST["confirm_password"] != ""){
            $new_password   = password_hash($_POST["confirm_password"], PASSWORD_DEFAULT);
            $check_pass         = $this->model('UserModel')->updateUser($this->user,$phonenumber,$email,$address,$new_password);
        }else {
            $check_pass         = $this->model('UserModel')->updateUser($this->user,$phonenumber,$email,$address);
        }
        
        if($check_pass == 1){
            Header("Location:".$this->getDomain()."/myaccount");
        }
    }
    public function checkPass()
    {   
        $password     = $_POST['password'];
        $check_pass   = $this->model('UserModel')->checkPassword($this->user,$password);
        if($check_pass == true){
            echo 1;
        }else {
            echo 2;
        }
    }
}
?>