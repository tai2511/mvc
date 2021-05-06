<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $domainLink."/public/font/css/font-awesome.min.css";?>" />
    <link rel="stylesheet" href="<?php echo $domainLink."/public/css/bootstrap.min.css";?>" />
    <link rel="stylesheet" href="<?php echo $domainLink."/public/css/admin.css";?>" />
    <title>Document</title>
</head>
<body>
    <header data-domain="<?php echo $domainLink; ?>">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo $domainLink; ?>">Demo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item menu">
                        <a class="nav-link" href="<?php echo $domainLink; ?>/myaccount/product?action=addnew">Product</a>
                        <ul class="sub-menu">
                            <li class="text-white"><a class="nav-link" href="<?php echo $domainLink; ?>/myaccount/product?action=addnew">Add new</a></li>
                            <li class="text-white"><a class="nav-link" href="<?php echo $domainLink; ?>/myaccount/product?action=viewall">All product</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $domainLink; ?>/myaccount/order">Order</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <?php if(isset($data["page"])):?>
            <?php require_once "product_admin/".$data["page"].".php"; ?>
        <?php endif;?>
        <?php if(!isset($data["page"])):?>
            <h5 class="title-heading">Dashboard</h5>
        <?php endif;?>
    </div>
    <footer id="footer" class="page-footer font-small cyan darken-3">
        <p class="text-center">Copyright © 2020 Company Name</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="<?php echo $domainLink; ?>/public/js/admin.js"></script>
</body>
</html>

