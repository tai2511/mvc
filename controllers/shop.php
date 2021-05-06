<?php
class shop extends Controller{
    protected $product_model;
    public function __construct()
    {
        $this->product_model = $this->model('ProductModel');
    }

    public function default()
    {   
        $product_per_page = 8;
        $order_by       = empty($this->getParamUrl('order_by')) ? "default" : $this->getParamUrl('order_by');
        $current_page   = empty($this->getParamUrl('page')) ? 1 : $this->getParamUrl('page');
        $total_product  = $this->product_model->getTotalProductFromDatabase();
        $tolal_page     = ceil($total_product/$product_per_page);
        $productList    = json_decode($this->product_model->getAllProductFromDatabase($current_page,$product_per_page,$order_by));

        $this->view("master1",[
            "page"          =>"shop",
            "productList"   => $productList,
            "tolal_page"    => $tolal_page,
            "current_page"  => $current_page,
            "order_by"      => $order_by
        ]);
    }

    public function productDetail()
    {
        $product_id   = $this->getParamUrl('product_id');
        $product_data = json_decode($this->product_model->getProductFromDatabase($product_id));
        $this->view("master1",[
            "page"=>"product-detail",
            "product_data" => $product_data
        ]);
    }
}
?>