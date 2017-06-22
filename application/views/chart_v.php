<div id="content" class="col-sm-9">
    <h1 class="title">Shopping Cart</h1>
    
    <?php
    if ($this->session->flashdata('notificationchart')) {
    ?>
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('notificationchart'); ?>
    </div>
    <?php
    }
    ?>

    <?php
    if ($this->session->flashdata('notificationempty')) {
    ?>
    <div class="alert alert-danger">
        <i class="fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('notificationempty'); ?>
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
                    <td class="text-left" width="20%">Quantity</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalQty = 0;
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
                    <td class="text-left">
                        <form action="<?php echo site_url('chart/updateitem'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="temp_id" value="<?php echo $r->temp_id; ?>">

                        <div class="input-group btn-block quantity">
                            <input type="text" name="qty" value="<?php echo $r->temp_qty; ?>" size="1" class="form-control" />
                            <span class="input-group-btn">
                            <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                            <a href="<?php echo site_url('chart/deleteitem/'.$r->temp_id); ?>"><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button></a>
                            </span>
                        </div>

                        </form>
                    </td>
                </tr>
                <?php 
                    $totalQty = ($totalQty+$r->temp_qty);
                } 
                ?>
            </tbody>
        </table>
    </div>    
    <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
                <tr>
                    <td class="text-right"><strong>Total :</strong></td>
                    <td class="text-right" width="50%"><?php echo $totalQty; ?> Quantity</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="buttons">
        <div class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-default">Continue Shopping</a></div>
        <div class="pull-right"><a href="<?php echo site_url('checkout'); ?>" class="btn btn-primary">Checkout</a></div>
    </div>
</div>