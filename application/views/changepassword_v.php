<div id="content" class="col-sm-9">
    <h1 class="title">Change Password</h1>
    <p class="lead">Hello, <strong><?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></strong> - To Change your Password.</p>

    <form class="form-horizontal" action="<?php echo site_url('changepassword/updatedata'); ?>" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

    <?php
    if ($this->session->flashdata('notification')) {
    ?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('notification'); ?>
    </div>
    <?php
    }
    ?>

    <?php if ($error == 'true') { ?>
    <div class="alert alert-danger">
        <i class="fa fa-exclamation-circle"></i> <b>ERROR !!</b>
        <?php echo validation_errors(); ?>
    </div>
    <?php } ?>

    <fieldset id="account">
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
            <input type="submit" class="btn btn-lg btn-primary" value="Update">
        </div>
    </div>
    </form>
</div>