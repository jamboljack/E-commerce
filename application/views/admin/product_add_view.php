<script type="text/javascript">
    function TampilSubKategory() {
        category_id = document.getElementById("lstMain").value;
        $.ajax({
            url:"<?php echo base_url();?>admin/product/pilih_subcategory/"+category_id+"",
            success: function(response) {
                $("#lstSubCategory").html(response);
            },
            dataType:"html"
        });
        return false;
    }
</script>

<script type="text/javascript">
    function TampilCategory() {
        category_id = document.getElementById("lstSubCategory").value;
        $.ajax({
            url:"<?php echo base_url();?>admin/product/pilih_category/"+category_id+"",
            success: function(response) {
                $("#lstCategory").html(response);
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
                <h4 class="page-title">Master Data</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Data</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/product'); ?>">Product</a>
                    </li>
                    <li class="active">
                        Add Product
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-plus-circle"></i> Add Data Product</b></h4>
                    <p class="text-muted m-b-30 font-13">Input Product</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/product/savedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Main Category *</label> 
                                <div class="col-md-9">
                                    <select class="form-control" name="lstMain" id="lstMain" onchange="TampilSubKategory()" required autofocus>
                                        <option value="0">- Choose Main Category -</option>
                                        <?php foreach($listMain as $m) { ?>
                                        <option value="<?php echo $m->category_id; ?>" <?php echo set_select('lstMain', $m->category_id); ?>><?php echo $m->category_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sub Category *</label> 
                                <div class="col-md-9">
                                    <?php
                                    $style_subcategory = 'class="form-control" id="lstSubCategory" onChange="TampilCategory()" required';
                                    echo form_dropdown("lstSubCategory", array('' => '- Choose Sub Category -'), '',$style_subcategory);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category *</label> 
                                <div class="col-md-9">
                                    <?php
                                    $style_category = 'class="form-control" id="lstCategory" required';
                                    echo form_dropdown("lstCategory", array('' => '- Choose Category -'), '',$style_category);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Brand *</label> 
                                <div class="col-md-9">
                                    <select class="form-control" name="lstBrand" required>
                                        <option value="0">- Choose Brand -</option>
                                        <?php foreach($listBrand as $b) { ?>
                                        <option value="<?php echo $b->brand_id; ?>" <?php echo set_select('lstBrand', $b->brand_id); ?>><?php echo $b->brand_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Product Name" value="<?php echo set_value('name'); ?>"  autocomplete="off" required>
                                    <?php echo form_error('name', '<p class="help-block alert-danger">','</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <textarea class="summernote" name="desc" rows="10"><?php echo set_value('desc'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Product ?</label>
                                <div class="col-md-9">
                                    <div class="checkbox checkbox-warning">
                                        <input name="chkNew" type="checkbox" value="1" >
                                        <label>Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Best Product ?</label>
                                <div class="col-md-9">
                                    <div class="checkbox checkbox-warning">
                                        <input name="chkBest" type="checkbox" value="1" >
                                        <label>Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Special Product ?</label>
                                <div class="col-md-9">
                                    <div class="checkbox checkbox-warning">
                                        <input name="chkSpecial" type="checkbox" value="1" >
                                        <label>Yes</label>
                                    </div>
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
                                        <span>Resolution : 500 x 500 pixel (Landscape)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/product'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button>

                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>