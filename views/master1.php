<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $domainLink;?>/public/font/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $domainLink;?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $domainLink;?>/public/css/style.css" />
    <title>Document</title>
</head>
<body>
    <header><?php require_once "blocks/header.php" ;?></header>
    <div class="container">
        <?php  require_once 'pages/'.$data["page"].'.php' ;?>
    </div>
    <footer><?php require_once "blocks/footer.php" ;?></footer>
    <script src="<?php echo $domainLink;?>/public/js/jquery.min.js"></script>
    <script src="<?php echo $domainLink;?>/public/js/main.js"></script>
</body>
</html>