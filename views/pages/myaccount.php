<form method="POST" action="<?php echo $domainLink."/myaccount/updateUser" ;?>">
    <h5 class="heading-title">My account</h5>
    <div class="form-group">
        <label>Phone number</label>
        <input name="phonenumber" type="number" class="form-control phonenumber" value="<?php echo $data['user_data']['phone'] ?>">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input name="email" type="email" class="form-control email" value="<?php echo $data['user_data']['email'] ?>">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input name="address" type="text" class="form-control address" value="<?php echo $data['user_data']['addressuser'] ?>">
    </div>
    <div class="form-group">
        <h5>Password change</h5>
        <label>Current password (leave blank to leave unchanged)</label>
        <input name="curent_password" type="password" class="form-control curent_password" autocomplete="new-password">
        <label>New password (leave blank to leave unchanged)</label>
        <input type="password" class="form-control new_password">
        <label>Confirm new password</label>
        <input name="confirm_password" type="password" class="form-control confirm_password">
    </div>
    <button type="submit" id="update_infor" class="btn btn-primary">Save change</button>
</form>