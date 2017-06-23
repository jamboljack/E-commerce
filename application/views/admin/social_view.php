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
<!-- Edit Data -->
<script type="text/javascript">
    $(function() {
        $(document).on("click",'.edit_button', function(e) {
            var id          = $(this).data('id');
            var name        = $(this).data('name');
            var url        = $(this).data('url');
            $(".id").val(id);
            $(".name").val(name);
            $(".url").val(url);
        })
    });
</script>
<!-- Hapus -->
<script>
    function hapusData(social_id) {
        var id = social_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data ini akan di Hapus !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('admin/social/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data Social Media</h4> 
            </div>            
            <form action="<?php echo site_url('admin/social/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Name</label> 
                            <input type="text" class="form-control" placeholder="Input Social Media Name" name="name" autocomplete="off" required autofocus> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media URL</label> 
                            <input type="text" class="form-control" placeholder="Input Social Media URL" name="url" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Upload Icon</label> 
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>img/noimage.png" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                <div>
                                    <span class="btn btn-blue btn-file">
                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                        <input type="file" class="default" name="userfile" />
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE !</span>
                                <span>Resolution : 32 x 32 pixel (Landscape)</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button> 
                </div> 
            </div>
            </form>
        </div>
    </div>
</div>

<div id="editdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Social Media</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/social/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control id" name="id">

            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Name</label> 
                            <input type="text" class="form-control name" placeholder="Input Social Media Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media URL</label> 
                            <input type="text" class="form-control url" placeholder="Input Social Media URL" name="url" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Change Icon</label> 
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>img/noimage.png" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                <div>
                                    <span class="btn btn-blue btn-file">
                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                        <input type="file" class="default" name="userfile" />
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE !</span>
                                <span>Resolution : 100 x 100 pixel (Landscape)</span>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button> 
                </div> 
            </div>
            </form>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Social Media</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Content</a>
                    </li>
                    <li class="active">
                        Social Media
                    </li>
                </ol>
            </div>
        </div>

        <?php if ($error == 'true') { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    <i class='fa fa-warning'></i> <b>ERROR !!</b>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Social Media List</b></h4>
                    <br>
                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Social Media Name</th>
                                <th width="20%">URL</th>
                                <th width="20%">Icon</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $social_id = $r->social_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->social_name; ?></td>
                                <td><?php echo $r->social_url; ?></td>
                                <td>
                                    <?php 
                                    if (empty($r->social_icon)) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>img/noicon.png">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>img/socialicons/<?php echo $r->social_icon; ?>">
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_button" data-toggle="modal" data-target="#editdata" data-id="<?php echo $r->social_id; ?>" data-name="<?php echo $r->social_name; ?>" data-url="<?php echo $r->social_url; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
                                    <a onclick="hapusData(<?php echo $social_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>