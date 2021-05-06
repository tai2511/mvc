<?php
    $title       = isset($data['edit']) ? "Edit product" : "Add new product"; 
    $title_image = "Add image";
if(isset($data['edit'])){
    if($data['edit']->image != ""){
        $title_image = "Change image";
    }
} ?>
<h4 class="title-heading"><?php echo $title ; ?>
    <?php if(isset($data['edit'])): ?>
        <a href="<?php echo $domainLink; ?>/myaccount/product?action=addnew"><button class="btn btn-primary">Add new</button></a>
        <a href="<?php echo $domainLink; ?>/shop/productDetail?product_id=<?php echo $data['edit']->id; ?>"><button class="btn btn-primary">View Product</button></a>
    <?php endif; ?>
</h4>
<form method="POST" action="../Product/addProductToDatabase" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 col-md-8">
            <div class="form-group">
                <input name="product_name" type="text" class="form-control" <?php if(isset($data['edit'])) echo 'value="'.$data['edit']->name.'"'; ?> placeholder="Product name">
            </div>
            <div class="form-group">
                <h6>Description</h6>
                <textarea name="product_description" class="form-control"><?php if(isset($data['edit'])) echo $data['edit']->description ; ?></textarea>
            </div>
            <div class="form-group">
                <input name="product_price" type="number" class="form-control" <?php if(isset($data['edit'])) echo 'value="'.$data['edit']->price.'"'; ?> placeholder="Price ($)">
            </div>
            <input type="hidden" class="file_url" name="file_url" <?php if(isset($data['edit'])) echo 'value="'.$data['edit']->image.'"'; ?>></input>
            <?php if(isset($data['edit'])){?>
                <input type="hidden" name="product_id" value="<?php echo $data['edit']->id; ?>">
                <button class="btn btn-primary" name="update_product"  type="submit">Update</button>
            <?php }else{ ?>
                <button class="btn btn-primary" name="add_product" type="submit">Add</button>
            <?php } ?>
        </div>
        <div class="col-4 col-md-4">
            <div class="preview">
                <?php if(isset($data['edit']) && $data['edit']->image != ""):?>
                        <img src="<?php echo $data['edit']->image; ?>">
                <?php endif; ?>
            </div>
            <div class="form-group form-upload-avt">
                <input type="file" name="file" autocomplete="off" id="upload_avt">
                <input class="btn btn-primary" type="button" value="<?php echo $title_image; ?>">
            </div>
        </div>
    </div>
</form>