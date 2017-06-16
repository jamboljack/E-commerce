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
    <div class="container">
         <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Contact Us</h4>
                <ol class="breadcrumb"></ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Data Contact Us</b></h4>
                    <p class="text-muted m-b-30 font-13">Detail Contact Us</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/contact/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $detail->contact_id; ?>">

                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="<?php echo $detail->contact_name; ?>" required autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Company Address *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" value="<?php echo $detail->contact_address; ?>" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">City *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="city" value="<?php echo $detail->contact_city; ?>" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Region *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="region" value="<?php echo $detail->contact_region; ?>" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Zip Code *</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="zipcode" value="<?php echo $detail->contact_zipcode; ?>" pattern="^[0-9]{1,5}$" title="Numeric, 5 Character" maxlength="5" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone *</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $detail->contact_phone; ?>" title="Numeric, 20 Character" maxlength="20" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">WhatsApp *</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="wa" value="<?php echo $detail->contact_wa; ?>" maxlength="20" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email *</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" value="<?php echo $detail->contact_email; ?>" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Work Hour *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="work" value="<?php echo $detail->contact_work; ?>" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>