<?php
class product extends Controller
{

    public $productModel;
    public function __construct(){
        $this->productModel = $this->model("ProductModel");
    }
    public function addProductToDatabase()
    {
        if(isset($_POST['add_product'])){

            $name = $_POST["product_name"];
            $description = $_POST["product_description"];
            $image = $_POST["file_url"];
            $price = $_POST["product_price"];

            $product_id = $this->productModel->addProductToDatabase($name,$description,$image,$price);

            Header("Location:".$this->getDomain()."/product/editProduct?id=".$product_id);
        }

        if(isset($_POST['update_product'])){

            $product_id = $_POST["product_id"];
            $name       = $_POST["product_name"];
            $description = $_POST["product_description"];
            $image      = $_POST["file_url"];
            $price      = $_POST["product_price"];

            $this->productModel->updateProductToDatabase($product_id,$name,$description,$image,$price);

            Header("Location:".$this->getDomain()."/product/editProduct?id=".$product_id);
        }
    }

    public function ajaxUploadAvatar()
    {   
        if(isset($_FILES['file0'])){
            $target_dir = "./public/images/";
            $target_file = $target_dir . basename($_FILES["file0"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["file0"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            }else {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "false";
            } else {
                if (move_uploaded_file($_FILES["file0"]["tmp_name"], $target_file)) {
                    echo "true";
                }
            }
        }
        
    }

    public function editProduct()
    {   
        $product_id =  $this->getParamUrl('id');
        $data_product = json_decode($this->productModel->getProductFromDatabase($product_id));
        $this->view('masteradmin',[
                "page" => "addnewproduct",
                "edit" => $data_product
            ]);
    }

    public function deleteProduct()
    {   
        $product_id     = $this->getParamUrl('id');
        $check_delete   = $this->productModel->deleteProductFromDatabase($product_id);
        Header('Location: '.$this->getDomain().'/myaccount/product?action=viewall');
    }
}
?>