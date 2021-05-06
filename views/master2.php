<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $domainLink; ?>/public/font/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo $domainLink; ?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $domainLink; ?>/public/css/style.css" />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php  require_once 'pages/'.$data["page"].'.php' ;?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="<?php echo $domainLink; ?>/public/js/main.js"></script>
</body>
</html>