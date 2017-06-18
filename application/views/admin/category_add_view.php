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
                <h4 class="page-title">Master Data</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Data</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/category'); ?>">Category</a>
                    </li>
                    <li class="active">
                        Add Category
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-plus-circle"></i> Add Data Category</b></h4>
                    <p class="text-muted m-b-30 font-13">Input Category</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/category/savedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group"> 
                                <label class="col-md-3 control-label">Main Category *</label> 
                                <div class="col-md-9">
                                    <select class="form-control" name="lstMainCategory" id="lstMainCategory" onchange="TampilSubKategory()" required autofocus>
                                        <option value="0">- Choose Main Category -</option>
                                        <?php foreach($listMain as $m) { ?>
                                        <option value="<?php echo $m->maincategory_id; ?>" <?php echo set_select('lstMainCategory', $m->maincategory_id); ?>><?php echo $m->maincategory_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sub Category *</label> 
                                <div class="col-md-9">
                                    <?php
                                    $style_subcategory = 'class="form-control" id="lstSubCategory" required';
                                    echo form_dropdown("lstSubCategory", array('' => '- Choose Sub Category -'), '',$style_subcategory);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Category Name" value="<?php echo set_value('name'); ?>"  autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/category'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>