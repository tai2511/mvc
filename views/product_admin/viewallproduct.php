<h4 class="title-heading">Products
  <a href="<?php echo $domainLink; ?>/myaccount/product?action=addnew"><button class="btn btn-primary">Add new</button></a>
</h4>
<table class="table table-striped">
  <tr>
    <th><i class="fa fa-picture-o" aria-hidden="true"></i></th>
    <th>Name</th>
    <th>Price($)</th>
    <th>Date</th>
  </tr>
  <?php foreach($data["product_list"] as $k => $v):?>
    <tr>
        <td>
        <img src="<?php if($v[3] != ""){
            echo $v[3];
        }else{
            echo $domainLink."./public/images/logo.jpg";
        } ?>" class="img-product">
        </td>
        <td>
            <p><?php echo $v[1]; ?></p>
            <span><a href="<?php echo $domainLink; ?>/product/editProduct?id=<?php echo $v[0]; ?>">Edit</a></span>
            <span><a href="<?php echo $domainLink; ?>/shop/productDetail?product_id=<?php echo $v[0]; ?>">View</a></span>
            <span><a onclick="return confirm('Are you sure you want to delete this product?')" href="<?php echo $domainLink; ?>/product/deleteProduct?id=<?php echo $v[0]; ?>">Delete</a></span>
        </td>
        <td><?php echo $v[4]; ?></td>
        <td><?php echo $v[5]; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php if($data['tolal_page'] > 1): ?>
<nav class='d-flex' aria-label="Page navigation example">
    <ul class="pagination page-pagination">
      <?php if($data['current_page'] > 1): ?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $domainLink; ?>/myaccount/product?action=viewall&page=<?php echo $data['current_page']-1; ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php endif; ?>
      <?php for($i = 1; $i <= $data['tolal_page'] ; $i++){ ?>
        <li class="page-item"><a class="page-link" href="<?php echo $domainLink; ?>/myaccount/product?action=viewall&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
      <?php if($data['current_page'] < $data['tolal_page']): ?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $domainLink; ?>/myaccount/product?action=viewall&page=<?php echo $data['current_page']+1; ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>