<h5 class="heading-title">Cart</h5>
<p class="notice-remove">The product has been successfully removed</p>
<?php if(!empty($data['cart_item'])){ ?>
<form id="cart" action="<?php echo $domainLink.'/checkout'; ?>" method="POST">
    <table class="table table-striped table-cart">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Product</th>
            <th scope="col">Price($)</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal($)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['cart_item'] as $k => $v) :?>
            <tr class="cart-item">
                <th scope="row"><i class="fa fa-times remove-cart" product-id="<?php echo $v[0]; ?>" aria-hidden="true"></i></th>
                <td><img class="img-product-cart" 
                        src="<?php if($v[2] != ""){
                                echo $v[2];
                            }else{
                                echo $domainLink."/public/images/logo.jpg"; 
                            } ?>" >
                </td>
                <td><h6><?php echo $v[1]; ?></h6></td>
                <td><span><?php echo $v[3]; ?></span></td>
                <td><span><?php echo $v[4]?></span></td>
                <td><?php echo ($v[3]*$v[4]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Check out</button>
</form>
<?php }else{ ?>
    <p>Your cart is currently empty.</p>
<?php } ?>

