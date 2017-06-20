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
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Edit Data Users</b></h4>
                    <p class="text-muted m-b-30 font-13">Edit Users</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/users/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $detail->user_username; ?>">

                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Username *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $detail->user_username; ?>"  readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password *</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" value="" name="password" placeholder="Input Password" autocomplete="off">
                                    <p>*) Isi Password jika ingin diubah.</p>
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
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Level *</label> 
                                <div class="col-md-4">
                                    <select class="form-control" name="lstLevel" required>
                                        <option value="">- Pilih Level User -</option>
                                        <option value="Admin" <?php if ($detail->user_level == 'Admin') { echo 'selected'; } ?>>Admin</option>
                                        <option value="Member" <?php if ($detail->user_level == 'Member') { echo 'selected'; } ?>>Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Status</label> 
                                <div class="col-md-4">
                                    <select class="form-control" name="lstStatus" required>
                                        <option value="">- Pilih Status User -</option>
                                        <option value="Active" <?php if ($detail->user_status == 'Active') { echo 'selected'; } ?>>Active</option>
                                        <option value="Non Active" <?php if ($detail->user_status == 'Non Active') { echo 'selected'; } ?>>Non Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>