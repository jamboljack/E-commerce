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
                                        <option value="0">- Choose Main Category -</option>
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