<?php
    $product_data = $data["product_data"];
    $image = $product_data->image == "" ? $domainLink."/public/images/logo.jpg" : $product_data->image;
?>
<section class="mb-5 product-id" product_id="<?php echo $product_data->id;?>" user="<?php echo $_SESSION['username'];?>">

  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="row product-gallery mx-1">
            <div class="col-12 mb-0">
                <figure class="view overlay rounded z-depth-1 main-img">
                    <a href="<?php echo $image;?>"
                    data-size="710x823">
                    <img src="<?php echo $image;?>"
                        class="img-fluid z-depth-1">
                    </a>
                </figure>
            </div>
        </div>
    </div>
    <div class="col-md-6">

      <h5><?php echo $product_data->name; ?></h5>
      <p><span class="mr-1"><strong><?php echo "$".$product_data->price; ?></strong></span></p>
      <p class="pt-1"><?php echo $product_data->description; ?></p>
      <hr>
      <input class="quantity" type="number" value="1" min="1">
      <button type="button" class="btn btn-primary btn-md mr-1 mb-2 add-to-cart">Add to cart</button>
    </div>
  </div>

</section>