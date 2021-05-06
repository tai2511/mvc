<?php
class register extends Controller
{
    public function default(){
        $this->view("master2",[
            "page"=>"register"
        ]);
    }
    public function process(){
        if(isset($_POST["btnRegister"])){
            $user = $_POST["username"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email = $_POST["email"];
            $phone = $_POST["phone"];  
            $address = $_POST["address"];

            $userModel = $this->model("UserModel");
            $result = $userModel->addUser($user,$password,$email,$phone,$address);

            if($result == true){
                $_SESSION['username'] = $user;
                $_SESSION['password'] = $password;
                Header("Location:".$this->getDomain());
            }
        }
    }
    public function checkUserLogin(){
        $user = $_POST["username"];
        echo $this->model("UserModel")->getUser($user);
    }
}
?>