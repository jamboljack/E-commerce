<script language="JavaScript" type="text/JavaScript">
function CekList() {    
    var checker = document.getElementById('chkReg');
    var sendbtn = document.getElementById('btnSave');
    
    checker.onchange = function(){
        if (this.checked) {
            sendbtn.disabled = false;
        } else {
            sendbtn.disabled = true;
        }   
    }
}
</script>

<div id="content" class="col-sm-9">
    <h1 class="title">Register Account</h1>
    <p>If you already have an account with us, please login at the <a href="<?php echo site_url('login'); ?>">Login Page</a>.</p>
    <form class="form-horizontal" action="<?php echo site_url('register/savedata/'.$this->uri->segment(3)); ?>" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="email" value="<?php echo $detail->user_username; ?>">

    <?php if ($error == 'true') { ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i> <b>ERROR !!</b>
                <?php echo validation_errors(); ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <fieldset id="account">
        <legend>Your Personal Details</legend>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" name="name" autocomplete="off" required autofocus>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Address" value="<?php echo set_value('address'); ?>" name="address" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Region</label>
            <div class="col-sm-5">
                <select class="form-control" name="lstRegion">
                    <option value=""> --- Please Select --- </option>
                    <?php foreach($listRegion as $r) { ?>
                    <option value="<?php echo $r->region_id; ?>" <?php echo set_select('lstRegion', $r->region_id); ?>><?php echo $r->region_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">City</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="City" value="<?php echo set_value('city'); ?>" name="city" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Zip Code</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Zip Code" value="<?php echo set_value('zipcode'); ?>" name="zipcode" maxlength="5" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Mobile</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Phone" value="<?php echo set_value('phone'); ?>" name="phone" autocomplete="off" required>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Your Password</legend>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Password Confirm</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" placeholder="Password Confirm" name="passwordconfirm" autocomplete="off" required>
            </div>
        </div>
    </fieldset>
    <div class="buttons">
        <div class="pull-right">
            <input type="checkbox" name="chkReg" id="chkReg" onclick="CekList()">
            &nbsp;I have read and agree to the <b>Privacy Policy</b> &nbsp;
            <input type="submit" class="btn btn-primary" name="btnSave" id="btnSave" disabled value="Create Account">
        </div>
    </div>
    </form>
</div>