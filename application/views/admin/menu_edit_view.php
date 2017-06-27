<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Menu</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Content</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/menu'); ?>">Menu</a>
                    </li>
                    <li class="active">
                        Edit Menu
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Edit Data Menu</b></h4>
                    <p class="text-muted m-b-30 font-13">Edit Menu</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/menu/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="id" value="<?php echo $detail->menu_id; ?>">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Menu Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Menu Name" value="<?php echo $detail->menu_name; ?>"  autocomplete="off" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description *</label>
                                <div class="col-md-9">
                                    <textarea class="summernote" name="desc" rows="10"><?php echo $detail->menu_desc; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/menu'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>