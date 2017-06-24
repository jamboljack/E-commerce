<div id="content" class="col-sm-9">
    <h1 class="title">Account Login</h1>
    
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
    
    <div class="row">
        <div class="col-sm-6">
            <h2 class="subtitle">New Customer</h2>
            <?php
            if ($this->session->flashdata('notificationregister')) {
            ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('notificationregister'); ?>
            </div>
            <?php
            }
            ?>

            <?php
            if ($this->session->flashdata('notificationregerror')) {
            ?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('notificationregerror'); ?>
            </div>
            <?php
            }
            ?>

            <p><strong>Register Account</strong></p>
            <p>Put your email below to register in KcFurnindo Jepara</p>
            <form action="<?php echo site_url('register/sendemail'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group">
                <input type="email" name="email" placeholder="E-Mail Address" class="form-control" autocomplete="off" required />
            </div>
            <p>* Password will be sent to your email directly, please check your inbox after registering<br>
            ** If you do not receive any email from us, try checking your Spam Folder or contact us for any assistance
            </p>
            <input type="submit" value="Register" class="btn btn-primary" />
            </form>
        </div>

        <div class="col-sm-6">
            <h2 class="subtitle">Returning Customer</h2>
            <?php
            if ($this->session->flashdata('notificationerror')) {
            ?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('notificationerror'); ?>
            </div>
            <?php
            }
            ?>
            <p><strong>I am a returning customer</strong></p>
            
            <form action="<?php echo site_url('login/validasi'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group">
                <label class="control-label">E-Mail Address</label>
                <input type="email" name="email" placeholder="E-Mail Address" class="form-control" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" name="password"  placeholder="Password" class="form-control" autocomplete="off" required />
                <br />
                <a href="<?php echo site_url('forgotpassword'); ?>">Forgot Password ?</a>
            </div>
            <input type="submit" value="Login" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>