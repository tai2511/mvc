<?php
class login extends Controller
{
    public function default(){
        $this->view('master2',[
            "page"=>"login"
        ]);
    }
    public function checkLogIn(){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $userModel = $this->model("UserModel");
        $checkUser = $userModel->checkUser($username,$password);

        if($checkUser == true){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }
        echo json_encode($checkUser);
        exit;
    }
    public function logOut(){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            unset($_SESSION['username']); 
            unset($_SESSION['password']); 
        }
        Header("Location:".$this->getDomain());
    }
}
?>
