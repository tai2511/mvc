<form action="./register/process" method="POST" class="form">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control username_register" placeholder="Enter username">
        <span class="notice-name" style="display:none">Username is already taken</span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control password_register"  placeholder="Enter password" autocomplete="new-password">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control"  placeholder="Enter email">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="number" name="phone" class="form-control"  placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control"  placeholder="Enter address">
    </div>
    <a href ="<?php echo $domainLink; ?>" class="btn btn-success">Login</a>
    <button type="submit" name="btnRegister" class="create-new btn btn-primary register">Register</button>
</form>

