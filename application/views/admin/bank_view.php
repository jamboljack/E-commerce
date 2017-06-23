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
                <h4 class="page-title">Bank</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Content</a>
                    </li>
                    <li class="active">
                        Bank
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Data Bank</b></h4>
                    <p class="text-muted m-b-30 font-13">Detail Bank</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/bank/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $detail->bank_id; ?>">

                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bank Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="<?php echo $detail->bank_name; ?>" required autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">No. Account *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_account" value="<?php echo $detail->bank_no_account; ?>" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Owner Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="owner" value="<?php echo $detail->bank_owner; ?>" required autocomplete="off">
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