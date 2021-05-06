<?php 

$order_data   = $data['order_data'];
$order_item   = json_decode($order_data['order_item']);
$order_detail = json_decode($order_data['order_detail']);
?>
<form class="order-admin" method="POST" action="<?php echo $domainLink."/myaccount/updateOrder" ?>">
    <h4 class="title-heading">Edit order</h4>
    <section>
        <h3>Order #<?php echo $order_data['order_id']; ?></h3>
        <div class="row">
            <div class="col-12 col-xs-12 col-lg-4">
                <h6>General</h6>
                <div class="form-group">
                    <label>Date created:</label>
                    <input readonly type="text" class="form-control" value="<?php echo $order_data['time']; ?>">
                </div>
                <div class="form-group">
                    <label>Date created:</label>
                    <select type="email" class="form-control status" name="status_order">
                        <option <?php if($order_data['status'] == 'New') echo "selected";?>>New</option>
                        <option <?php if($order_data['status'] == 'Processing') echo "selected";?>>Processing</option>
                        <option <?php if($order_data['status'] == 'Completed') echo "selected";?>>Completed</option>
                        <option <?php if($order_data['status'] == 'Cancelled') echo "selected";?>>Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer:</label>
                    <input readonly type="text" class="form-control" value="<?php echo $order_detail[0]." ".$order_detail[1]; ?>">
                </div>
            </div>
            <div class="col-12 col-xs-12 col-lg-4">
                <h6>Billing</h6>
                <p>Name : <?php echo $order_detail[0]." ".$order_detail[1]; ?></p>
                <p>Email : <?php echo $order_detail[2]; ?></p>
                <p>Address : <?php echo $order_detail[3]; ?></p>
                <p>State : <?php echo $order_detail[5]; ?></p>
                <p>Country : <?php echo $order_detail[4]; ?></p>
            </div>
            <div class="col-12 col-xs-12 col-lg-4">
                <h6>Payment method</h6>
                <p>Cash on delivery</p>
            </div>
        </div>
    </section>
    <section>
        <h3>Product</h3>
        <table class="table table-striped table-cart">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Product</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($order_item as $k => $v) :  
                ?>
                <tr class="cart-item">
                    <td><img class="img-product" src="<?php echo $v[2]; ?>"></td>
                    <td><p><?php echo $v[1]; ?></p></td>
                    <td><span><?php echo $v[3]; ?></span></td>
                    <td><span><?php echo $v[4]; ?></span></td>
                    <td><span><?php echo $v[4]*$v[3]; ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <input type="hidden" value="<?php echo $order_data['order_id'];?>" name="order_id">
    <button class="btn btn-primary" type="submit">Update</button>
</form>