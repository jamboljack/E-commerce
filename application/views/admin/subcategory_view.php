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
            var main        = $(this).data('main');
            $(".id").val(id);
            $(".name").val(name);
            $(".main").val(main);
        })
    });
</script>
<!-- Hapus -->
<script>
    function hapusData(subcategory_id) {
        var id = subcategory_id;
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
            window.location.href="<?php echo site_url('admin/subcategory/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data Sub Category</h4> 
            </div>            
            <form action="<?php echo site_url('admin/subcategory/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Sub Category Name</label> 
                            <input type="text" class="form-control" placeholder="Input Sub Category Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Main Category</label> 
                            <select class="form-control" name="lstMainCategory" required>
                                <option value="">- Choose Main Category -</option>
                                <?php foreach($listMain as $r) { ?>
                                <option value="<?php echo $r->maincategory_id; ?>"><?php echo $r->maincategory_name; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Upload Image</label> 
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>img/noimage.png" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                <div>
                                    <span class="btn btn-blue btn-file">
                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                        <input type="file" class="default" name="userfile" required />
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE !</span>
                                <span>Resolution : (200 x 200 pixel)</span>
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
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Sub Category</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/subcategory/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control id" name="id">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Sub Category Name</label> 
                            <input type="text" class="form-control name" placeholder="Input Sub Category Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Main Category</label> 
                            <select class="form-control main" name="lstMainCategory" required autofocus>
                                <option value="">- Choose Main Category -</option>
                                <?php foreach($listMain as $r) { ?>
                                <option value="<?php echo $r->maincategory_id; ?>"><?php echo $r->maincategory_name; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Change Image</label> 
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
                                <span>Resolution : (200 x 200 pixel)</span>
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
                <h4 class="page-title">Sub Category</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Data</a>
                    </li>
                    <li class="active">
                        Sub Category
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Sub Category List</b></h4>
                    <br>
                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Number</th>
                                <th width="20%">Main Category Name</th>
                                <th>Sub Category Name</th>
                                <th width="20%">Image</th>
                                <th width="10%">Order</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $subcategory_id = $r->subcategory_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->subcategory_no; ?></td>
                                <td><?php echo $r->maincategory_name; ?></td>
                                <td><?php echo $r->subcategory_name; ?></td>
                                <td>
                                    <?php 
                                    if (empty($r->subcategory_image)) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>img/noproduct.jpg" width="50%">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>img/subcategory/<?php echo $r->subcategory_image; ?>" width="50%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <div align="center">
                                    <?php 
                                        if ($r->subcategory_no == 1) { 
                                            echo ""; 
                                        } else {
                                        ?>
                                        <a href="<?php echo site_url('admin/subcategory/up/'.$r->subcategory_id.'/'.$r->subcategory_no); ?>" title="Up">&uarr;</a> 
                                           &nbsp;&nbsp;&nbsp;&nbsp; 
                                        <?php } ?>
                                        <a href="<?php echo site_url('admin/subcategory/down/'.$r->subcategory_id.'/'.$r->subcategory_no); ?>" title="Down">&darr;</a>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_button" data-toggle="modal" data-target="#editdata" data-id="<?php echo $r->subcategory_id; ?>" data-name="<?php echo $r->subcategory_name; ?>" data-main="<?php echo $r->maincategory_id; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
                                    <a onclick="hapusData(<?php echo $subcategory_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
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