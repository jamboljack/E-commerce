<script type="text/javascript">
    $(document).ready(function () {
        $("#lstCategory").select2({});
        $("#lstCollection").select2({});
    });
</script>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Product</h4>
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
                                <label class="col-md-3 control-label">Category *</label> 
                                <div class="col-md-9">
                                    <select class="form-control select2" name="lstCategory" id="lstCategory"  required autofocus>
                                        <option value="">- Choose Category -</option>
                                        <?php foreach($listSubCategory as $s) { ?>
                                        <optgroup label="<?php echo $s->maincategory_name.' - '.$s->subcategory_name; ?>">
                                            <?php 
                                            $subcategory_id = $s->subcategory_id;
                                            $listCategory   = $this->product_model->select_category($subcategory_id)->result();
                                            foreach($listCategory as $c) {
                                            ?>
                                            <option value="<?php echo $c->category_id; ?>" <?php echo set_select('lstCategory', $c->category_id); ?>><?php echo $c->category_name; ?></option>
                                            <?php } ?>
                                        </optgroup>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Collection (Opsional)</label> 
                                <div class="col-md-9">
                                    <select class="form-control select2" name="lstCollection" id="lstCollection">
                                        <option value="">- Choose Collection -</option>
                                        <?php foreach($listCollection as $c) { ?>
                                        <option value="<?php echo $c->category_id; ?>" <?php echo set_select('lstCollection', $c->category_id); ?>><?php echo $c->category_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Product Name" value="<?php echo set_value('name'); ?>"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description *</label>
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