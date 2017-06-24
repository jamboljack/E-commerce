<div id="content" class="col-sm-9">
    <h1 class="title">Order Information</h1>        
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td colspan="2" class="text-left">Order Detail</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 50%;" class="text-left">
                    <b>Order ID :</b> #<?php echo $detail->order_id; ?><br>
                    <b>Date Order :</b> <?php echo date("d-m-Y", strtotime($detail->order_date)).' '.$detail->order_time; ?>
                </td>
                <td style="width: 50%;" class="text-left">
                    <b>Payment Method :</b> Bank Transfer
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
                <td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left">
                    <?php echo ucwords(strtolower($detail->user_name)); ?><br>
                    <?php echo ucwords(strtolower($detail->user_address)); ?><br>
                    <?php echo ucwords(strtolower($detail->user_city)).' '.$detail->user_zipcode; ?><br>
                    <?php echo $detail->region_name; ?><br>
                    <?php echo $detail->user_phone; ?>
                </td>
                <td class="text-left">
                    <?php echo ucwords(strtolower($detail->shipping_name)); ?><br>
                    <?php echo ucwords(strtolower($detail->shipping_address)); ?><br>
                    <?php echo ucwords(strtolower($detail->shipping_city)).' '.$detail->shipping_zipcode; ?><br>
                    <?php echo $detail->negara; ?><br>
                    <?php echo $detail->shipping_phone; ?>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td class="text-center" width="20%">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left" width="30%">Category</td>
                    <td class="text-right" width="10%">Quantity</td>
                    <td style="width: 20px;"></td>
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
                    <td class="text-right"><?php echo $r->detail_qty; ?></td>
                    <td style="white-space: nowrap;" class="text-right">
                        <form action="<?php echo site_url('chart/addtochart'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="product_id" value="<?php echo $r->product_id; ?>">
                        <input type="hidden" name="qty" value="1">

                        <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i></button>

                        </form>
                    </td>
                </tr>
                <?php 
                    $totalQty = ($totalQty+$r->detail_qty);
                } 
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td class="text-right"><b>Total Qty</b></td>
                    <td class="text-right"><?php echo $totalQty; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td class="text-right"><b>Total</b></td>
                    <td class="text-right"><?php echo number_format($detail->order_total); ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <h3>Order History</h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td class="text-left">Date Added</td>
                <td class="text-left">Status</td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($detail->order_date_process)) { ?>
            <tr>
                <td class="text-left"><?php echo date("d-m-Y", strtotime($detail->order_date_process)); ?></td>
                <td class="text-left">Process</td>
            </tr>
            <?php } ?>
            <?php if (!empty($detail->order_date_shipping)) { ?>
            <tr>
                <td class="text-left"><?php echo date("d-m-Y", strtotime($detail->order_date_shipping)); ?></td>
                <td class="text-left">Shipping</td>
            </tr>
            <?php } ?>
            <?php if (!empty($detail->order_date_closed)) { ?>
            <tr>
                <td class="text-left"><?php echo date("d-m-Y", strtotime($detail->order_date_closed)); ?></td>
                <td class="text-left">Closed</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>