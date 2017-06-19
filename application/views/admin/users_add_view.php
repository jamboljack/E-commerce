<script type="text/javascript">
    $(document).ready(function () {
        $("#lstRegion").select2({});
    });
</script>

<div class="content">
    <div class="container">
         <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Users</h4>
                <ol class="breadcrumb"></ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-plus-circle"></i> Add Data Users</b></h4>
                    <p class="text-muted m-b-30 font-13">Input Users</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/users/savedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Username *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo set_value('username'); ?>" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Don't Use SPACE, Max. 20 Character" placeholder="Input Username" autocomplete="off" autofocus required>
                                    <?php echo form_error('username', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password *</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" value="" name="password" placeholder="Input Password" autocomplete="off" required>
                                    <?php echo form_error('password', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Name" value="<?php echo set_value('name'); ?>"  autocomplete="off" required>
                                    <?php echo form_error('name', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" placeholder="Input Address" value="<?php echo set_value('address'); ?>"  autocomplete="off" required>
                                    <?php echo form_error('address', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Region *</label> 
                                <div class="col-md-4">
                                    <select class="form-control select2" name="lstRegion" id="lstRegion" required>
                                        <option value="">- Choose Region -</option>
                                        <?php foreach($listRegion as $r) { ?>
                                        <option value="<?php echo $r->region_id; ?>" <?php echo set_select('lstRegion', $r->region_id); ?>><?php echo $r->region_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">City *</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="city" placeholder="Input City" value="<?php echo set_value('city'); ?>"  autocomplete="off" required>
                                    <?php echo form_error('city', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Zip Code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="zipcode" placeholder="Input Zip Code" value="<?php echo set_value('zipcode'); ?>" maxlength="5" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile *</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="mobile" placeholder="Input Mobile Number" value="<?php echo set_value('mobile'); ?>" pattern="^[0-9]{1,12}$" title="Don't Use SPACE, Max. 12 Character" maxlength="12"  autocomplete="off" required>
                                    <?php echo form_error('mobile', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone *</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="phone" placeholder="Input Phone Number" value="<?php echo set_value('phone'); ?>"  autocomplete="off" required>
                                    <?php echo form_error('phone', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Level *</label> 
                                <div class="col-md-4">
                                    <select class="form-control" name="lstLevel" required>
                                        <option value="">- Pilih Level User -</option>
                                        <option value="Admin" <?php echo set_select('lstLevel', 'Admin'); ?>>Admin</option>
                                        <option value="Member" <?php echo set_select('lstLevel', 'Member'); ?>>Member</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button>

                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>