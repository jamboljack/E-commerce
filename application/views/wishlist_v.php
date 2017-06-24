<div id="content" class="col-sm-9">
    <h1 class="title">Wish List</h1>
    
    <?php
    if ($this->session->flashdata('notification')) {
    ?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('notification'); ?>
    </div>
    <?php
    }
    ?>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center" width="20%">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left" width="20%">Category</td>
                    <td class="text-left" width="18%">Update</td>
                    <td width="5%"></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listItem as $r) { 
                ?>
                <tr>
                    <td class="text-center">
                        <a href="<?php echo site_url('product/item/'.$r->product_id.'/'.$r->product_name_seo); ?>">
                            <img src="<?php echo base_url(); ?>img/product/<?php echo $r->product_image; ?>" width="100" heigth="100" alt="<?php echo ucwords(strtolower($r->product_name)); ?>" title="<?php echo ucwords(strtolower($r->product_name)); ?>" class="img-thumbnail" />
                        </a>
                    </td>
                    <td class="text-left"><a href="<?php echo site_url('product/item/'.$r->product_id.'/'.$r->product_name_seo); ?>"><?php echo ucwords(strtolower($r->product_name)); ?></a></td>
                    <td class="text-left"><?php echo ucwords(strtolower($r->category_name)); ?></td>
                    <td class="text-left"><?php echo date("d-m-Y H:i:s", strtotime($r->wishlist_update)); ?></td>
                    <td>
                        <a href="<?php echo site_url('wishlist/deleteitem/'.$r->wishlist_id); ?>">
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i>
                        </button>
                        </a>
                    </td>
                </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>