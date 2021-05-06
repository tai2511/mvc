<?php  $order_by = $data["order_by"] ==  "default" ? "" : "&order_by=".$data["order_by"]."";  ?>

<div class="d-flex">
    <h5 class="heading-title">Shop</h5>
    <select class="form-control" id="sort-by" onchange="location = this.value;">
      <option <?php if($data["order_by"] == "default") echo "selected "; ?> value="<?php echo $domainLink; ?>/shop?page=<?php echo $data['current_page']; ?>">Default sorting</option>
      <option <?php if($data["order_by"] == "date") echo "selected "; ?>value="<?php echo $domainLink; ?>/shop?order_by=date&page=<?php echo $data['current_page']; ?>">Sort by latest</option>
      <option <?php if($data["order_by"] == "price") echo "selected "; ?>value="<?php echo $domainLink; ?>/shop?order_by=price&page=<?php echo $data['current_page']; ?>">Sort by low to high</option>
      <option <?php if($data["order_by"] == "price-desc") echo "selected "; ?> value="<?php echo $domainLink; ?>/shop?order_by=price-desc&page=<?php echo $data['current_page']; ?>">Sort by high to low</option>
      <option <?php if($data["order_by"] == "a-z") echo "selected "; ?>value="<?php echo $domainLink; ?>/shop?order_by=a-z&page=<?php echo $data['current_page']; ?>">Sort by A - Z</option>
      <option <?php if($data["order_by"] == "z-a") echo "selected "; ?>value="<?php echo $domainLink; ?>/shop?order_by=z-a&page=<?php echo $data['current_page']; ?>">Sort by Z - A</option>
    </select>
</div>
<ul id="product-page" class="row">
    <?php foreach($data['productList'] as $k => $v): ?>
    <li class="col-12 col-md-4 col-lg-3">
        <a href="<?php echo $domainLink."/shop/productDetail?product_id=".$v[0]."" ?>" class="">
            <img src="<?php if($v[3] != ""){
                    echo $v[3];
                }else{
                    echo $domainLink."./public/images/logo.jpg";
                } ?>" class="img-fluid">
            <p class="text-center text-secondary"><?php echo $v[2]; ?></p>
            <p class="text-center text-secondary"><?php echo "$".$v[4]; ?></p>
        </a>
    </li>
    <?php endforeach;?>
</ul>
<?php if($data['tolal_page'] > 1): ?>
<nav class='d-flex' aria-label="Page navigation example">
    <ul class="pagination page-pagination">
        <?php if($data['current_page'] > 1): ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $domainLink; ?>/shop?page=<?php echo ($data['current_page']-1).$order_by ; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $data['tolal_page'] ; $i++){ ?>
            <li class="page-item"><a class="page-link" href="<?php echo $domainLink; ?>/shop?page=<?php echo $i.$order_by ; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <?php if($data['current_page'] < $data['tolal_page']): ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $domainLink; ?>/shop?page=<?php echo ($data['current_page']+1).$order_by ; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>