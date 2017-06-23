<!-- Notifikasi -->
<?php
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<div class="content">
    <div class="wraper container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Profile</h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/home'); ?>">Dashboard</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <?php if ($error == 'true') { ?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i> <b>ERROR !!</b> <br>
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>

            <div class="col-md-4 col-lg-3">
                <div class="profile-detail card-box">
                    <div>
                        <img src="<?php echo base_url(); ?>img/profil.png" class="img-circle" alt="profile-image">
                        <hr>
                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $detail->user_name; ?></span></p>
                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $detail->user_mobile; ?></span></p>
                            <p class="text-muted font-13"><strong>Phone :</strong><span class="m-l-15"><?php echo $detail->user_phone; ?></span></p>
                            <p class="text-muted font-13"><strong>Last Update :</strong><span class="m-l-15"><?php echo $detail->user_update; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                    <li class="tab active" style="width: 25%;"> 
                        <a href="#personal" data-toggle="tab" aria-expanded="true" class="active"> 
                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                            <span class="hidden-xs">Personal Detail</span> 
                        </a> 
                    </li> 
                    <li class="tab" style="width: 25%;"> 
                        <a href="#password" data-toggle="tab" aria-expanded="false" class=""> 
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                            <span class="hidden-xs">Change Password</span> 
                        </a> 
                    </li> 
                    <div class="indicator" style="right: 244px; left: 123px;"></div>
                </ul>
                <div class="tab-content"> 
                    <div class="tab-pane active" id="personal" style="display: block;">
                        <form class="form-horizontal" role="form" action="<?php echo site_url('admin/profile/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="username" value="<?php echo $detail->user_username; ?>">

                        <div class="row">
                            <div class="col-md-12">                                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $detail->user_username; ?>"  disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name *</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" placeholder="Input Name" value="<?php echo $detail->user_name; ?>"  autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address *</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address" placeholder="Input Address" value="<?php echo $detail->user_address; ?>"  autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-md-3 control-label">Region *</label> 
                                    <div class="col-md-4">
                                        <select class="form-control select2" name="lstRegion" id="lstRegion" required>
                                            <option value="">- Choose Region -</option>
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
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City *</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="city" placeholder="Input City" value="<?php echo $detail->user_city; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Zip Code</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="zipcode" placeholder="Input Zip Code" value="<?php echo $detail->user_zipcode; ?>" maxlength="5" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mobile *</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="mobile" placeholder="Input Mobile Number" value="<?php echo $detail->user_mobile; ?>" pattern="^[0-9]{1,12}$" title="Don't Use SPACE, Max. 12 Character" maxlength="12"  autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone *</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="phone" placeholder="Input Phone Number" value="<?php echo $detail->user_phone; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12" align="center">
                                <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>
                            </div>
                        </div>

                        </form>
                    </div> 
                    <div class="tab-pane" id="password" style="display: none;">
                        <form class="form-horizontal" role="form" action="<?php echo site_url('admin/profile/updatepassword'); ?>" method="post" enctype="multipart/form-data"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="username" value="<?php echo $detail->user_username; ?>">

                        <div class="row">
                            <div class="col-md-12">                                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">New Password *</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="newpassword" placeholder="Input New Password" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm Password *</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Input Confirm Password"  autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12" align="center">
                                <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Change</button>
                            </div>
                        </div>

                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>