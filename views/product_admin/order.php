<div class="order-admin">
    <h4 class="title-heading">Orders</h4>
    <table class="table table-striped table-cart">
        <thead>
            <tr>
                <th scope="col">Order</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($data['order_data'] as $k => $v) :
                $total = 0;
                $order_item = json_decode($v[2]);  
                foreach($order_item as $k1 => $v1){
                    $total += ($v1[3]*$v1[4]);
                }
                $order_data = json_decode($v[3]);    
            ?>
            <tr class="cart-item">
                <td><a href="<?php echo $domainLink."/myaccount/editOrder?order_id=".$v[0]; ?>"><h6><?php echo $v[0]." ".$order_data[0]; ?></h6></a></td>
                <td><span><?php echo $v[5]; ?></span></td>
                <td><span><?php echo $v[4]?></span></td>
                <td><?php echo $total; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


