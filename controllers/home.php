<?php

class home extends Controller
{
    function default(){
        
        $model = $this->model("UserModel");
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            $this->view("master2",[
                "page"=>"login"
            ]);
        }else{
            $this->view("master1",[
                "page"=>"homepage",
                "user"=>$_SESSION['username']
            ]);
        }
    }  
}
?>