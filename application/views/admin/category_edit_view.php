<script type="text/javascript">
    function TampilSubKategory() {
        maincategory_id = document.getElementById("lstMainCategory").value;
        $.ajax({
            url:"<?php echo base_url();?>admin/category/pilih_subcategory/"+maincategory_id+"",
            success: function(response) {
                $("#lstSubCategory").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Category</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Data</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/category'); ?>">Category</a>
                    </li>
                    <li class="active">
                        Edit Category
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Edit Data Category</b></h4>
                    <p class="text-muted m-b-30 font-13">Edit Category</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/category/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $detail->category_id; ?>">

                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Main Category *</label> 
                                <div class="col-md-9">
                                    <select class="form-control" name="lstMainCategory" id="lstMainCategory" onchange="TampilSubKategory()" required autofocus>
                                        <option value="">- Choose Main Category -</option>
                                        <?php 
                                        foreach($listMain as $m) { 
                                            if ($detail->maincategory_id == $m->maincategory_id) {
                                        ?>
                                            <option value="<?php echo $m->maincategory_id; ?>" selected><?php echo $m->maincategory_name; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $m->maincategory_id; ?>"><?php echo $m->maincategory_name; ?></option>
                                        <?php 
                                            }
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sub Category *</label> 
                                <div class="col-md-9">
                                    <select class="form-control" name="lstSubCategory" id="lstSubCategory" required>
                                        <option value="">- Choose Sub Category -</option>
                                        <?php 
                                        foreach($listSubCategory as $s) {
                                            if ($detail->subcategory_id == $s->subcategory_id) {
                                        ?>
                                        <option value="<?php echo $s->subcategory_id; ?>" selected><?php echo $s->subcategory_name; ?></option>
                                        <?php 
                                            } 
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Category Name" value="<?php echo $detail->category_name; ?>"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image</label>
                                <div class="col-md-9">
                                    <?php if (empty($detail->category_image)) { ?>
                                    <img src="<?php echo base_url(); ?>img/noproduct.jpg" width="20%">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>img/category/<?php echo $detail->category_image; ?>" width="20%">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Upload Image</label> 
                                <div class="col-md-9">
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
                    </div> 

                    <a href="<?php echo site_url('admin/category'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>