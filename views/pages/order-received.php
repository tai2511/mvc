<div class="order-recived">
    <h5 class="heading-title">Order received</h5>
    <?php if($data["order_data"] != ""): 
        $order_data     = $data["order_data"];
        
        $order_detail   = json_decode($order_data['order_detail']);
        $order_item     = json_decode($order_data['order_item']);
        $total_price_cart = 0;
        $email = $order_detail[2];
        foreach($order_item as $k => $v){
            $total_price_cart += ($v[3]*$v[4]);
        }
        ?>
        <p>Thank you. Your order has been received.</p>
        <ul class="">
            <li class="woocommerce-order-overview__order order"> Order number: <strong><?php echo $order_data["order_id"]; ?></strong></li>
            <li class="woocommerce-order-overview__date date">Date: <strong><?php echo $order_data["time"]; ?></strong> </li>
            <li class="woocommerce-order-overview__email email">Email: <strong><?php echo $email; ?></strong></li>
            <li class="woocommerce-order-overview__total total">Total: <strong><?php echo $total_price_cart; ?></strong></li>
            <li class="woocommerce-order-overview__payment-method method">Payment method: <strong>Cash on delivery</strong></li>
        </ul>
        <p>Pay with cash upon delivery</p>
        <h3 class="display3">Order details</h3>
        <table class="table table-striped table-cart">
            <thead>
                <th scope="col">Product</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order_item as $k => $v) :?>
                <tr>
                    <td><span><?php echo $v[1]." x ".$v[4]; ?></span></td>
                    <td><?php echo ($v[3]*$v[4]); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td scope="row">Payment method:</td>
                    <td scope="row">Cash on delivery</td>
                </tr>
                <tr>
                    <td scope="row">Total:</td>
                    <td scope="row"><?php echo $total_price_cart; ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
    <a class="btn btn-primary" href="<?php echo $domainLink."/shop"; ?>">Go to shop</a>
</div>
