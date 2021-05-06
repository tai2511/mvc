<div id="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo $domainLink; ?>">Demo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $domainLink; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $domainLink."/shop"; ?>">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $domainLink."/cart"; ?>">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $domainLink."/checkout"; ?>">Check out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $domainLink."/login/logout"; ?>">Log out</a>
        </li>
      </ul>
    </div>
    <div class="d-flex avatar">
        <h6 class="text-white">Hello <?php echo $_SESSION["username"]; ?></h6>
        <a href="<?php echo $domainLink; ?>/myaccount" class="d-flex" style='background-image:url("https://cdn.pixabay.com/photo/2021/04/06/14/46/city-6156596_960_720.jpg")'></a>
      </div>
  </nav>
</div>

