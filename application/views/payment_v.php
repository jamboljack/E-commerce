<div id="content" class="col-sm-9">
    <h1 class="title">Payment Address</h1>
    <p class="lead">Hello, <strong><?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></strong> - To Change your Payment Address.</p>
    <form class="form-horizontal" action="<?php echo site_url('payment/updatedata'); ?>" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="hidden" class="form-control" name="id" value="<?php echo $detail->payment_id; ?>">

    <?php
    if ($this->session->flashdata('notification')) {
    ?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('notification'); ?>
    </div>
    <?php
    }
    ?>

    <fieldset id="account">
        <legend>Payment Address Detail</legend>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Company Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Company Name" value="<?php echo $detail->payment_company; ?>" name="name" autocomplete="off" required autofocus>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Address" value="<?php echo $detail->payment_address; ?>" name="address" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Region</label>
            <div class="col-sm-5">
                <select class="form-control" name="lstRegion">
                    <option value=""> --- Please Select --- </option>
                    <?php 
                    foreach($listRegion as $r) { 
                        if ($detail->region_id == $r->region_id) {
                    ?>
                    <option value="<?php echo $r->region_id; ?>" selected><?php echo $r->region_name; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $r->region_id; ?>"><?php echo $r->region_name; ?></option>
                    <?php 
                        }
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">City</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="City" value="<?php echo $detail->payment_city; ?>" name="city" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Zip Code</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Zip Code" value="<?php echo $detail->payment_zipcode; ?>" name="zipcode" maxlength="5" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group required">
            <label class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Phone" value="<?php echo $detail->payment_phone; ?>" name="phone" autocomplete="off" required>
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