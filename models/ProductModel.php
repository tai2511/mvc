<?php
class ProductModel extends DB
{
    public function addProductToDatabase($name,$description,$image,$price)
    {   
        $time = date("Y/m/d");
        $query = "INSERT INTO products (name,description,image,price,time) VALUES ('".$name."','".$description."','".$image."',".$price.",'".$time."')";
        mysqli_query($this->conection, $query);

        $query_max_id   = "SELECT max(id) AS product_id FROM products";
        $id             =  mysqli_query($this->conection, $query_max_id);
        $id             = mysqli_fetch_assoc($id);
        return $this->queryDatabaseAssoc($query_max_id)['product_id'];
    }

    public function updateProductToDatabase($product_id,$name,$description,$image,$price)
    {
        $query = "UPDATE products SET name='".$name."', description='".$description."',image='".$image."', price=".$price." WHERE id=".$product_id." ";
        mysqli_query($this->conection, $query);
    }

    public function getProductFromDatabase($id)
    {   
        $query   = "SELECT * FROM products WHERE id=".$id."";
        $product_data_json  = json_encode($this->queryDatabaseAssoc($query));
        return $product_data_json;
    }

    public function getAllProductFromDatabase($current_page,$product_per_page,$order_by="")
    {   
        $start_row          = ($current_page - 1) * $product_per_page;
        if($order_by != ""){
            switch ($order_by) {
                case 'date':
                    $query          = "SELECT * FROM products ORDER BY time ASC LIMIT ".$start_row.",".$product_per_page."" ;
                    break;
                
                case 'price':
                    $query          = "SELECT * FROM products ORDER BY price ASC LIMIT ".$start_row.",".$product_per_page."" ;
                    break;
                
                case 'price-desc':
                    $query          = "SELECT * FROM products ORDER BY price DESC LIMIT ".$start_row.",".$product_per_page."" ;
                    break;
                
                case 'a-z':
                    $query          = "SELECT * FROM products ORDER BY name ASC LIMIT ".$start_row.",".$product_per_page."" ;
                    break;
                
                case 'z-a':
                    $query          = "SELECT * FROM products ORDER BY name DESC LIMIT ".$start_row.",".$product_per_page."" ;
                    break;
                
                default:
                    $query          = "SELECT * FROM products LIMIT ".$start_row.",".$product_per_page."";
                    break;
            }
            
        }else{
            $query          = "SELECT * FROM products LIMIT ".$start_row.",".$product_per_page."";
        }
        
        $product_data_obj   = mysqli_query($this->conection, $query);
        $product_data       = mysqli_fetch_all($product_data_obj);
        $product_data_json  = json_encode($product_data);
        return $product_data_json;
    }

    public function getTotalProductFromDatabase()
    {   
        $query   = "SELECT count(id) AS total_product FROM products";
        return $this->queryDatabaseAssoc($query)['total_product'];
    }
    public function deleteProductFromDatabase($product_id)
    {
        $query = "DELETE FROM products WHERE id=".$product_id."";
        $result = 0;
        if(mysqli_query($this->conection, $query)){
            $result = 1;
        }
        return $result;
    }
}
?>