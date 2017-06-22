<script type="text/javascript">
    $(document).ready(function () {
        $("#lstRegion").select2({});
    });
</script>

<div class="content">
    <div class="container">
         <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Transaction</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/order_open'); ?>">Order List</a>
                    </li>
                    <li class="active">
                        Detail Order
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo site_url('admin/'.$this->uri->segment(2).'/updatedata'); ?>" method="post"> 
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id" value="<?php echo $detail->order_id; ?>">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-right"><img src="<?php echo base_url(); ?>img/logo-header.png" alt="KcFurnindo"></h4>
                            </div>
                            <div class="pull-right">
                                <h4>Invoice # <br>
                                <strong><?php echo $detail->order_id; ?></strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left m-t-30">
                                    <address>
                                    To :<br>
                                    <strong><?php echo ucwords(strtolower($detail->user_name)); ?></strong><br>
                                    <?php echo ucwords(strtolower($detail->user_address)).' - '.ucwords(strtolower($detail->user_city)); ?><br>
                                    <?php echo $detail->region_name.' - '.$detail->user_zipcode; ?><br>
                                    <abbr title="Phone">P: </abbr> <?php echo $detail->user_phone; ?>
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p class="m-t-10"><strong>Order ID : </strong> #<?php echo $detail->order_id; ?></p>
                                    <p class="m-t-10"><strong>Order Date : </strong> <?php echo tgl_indo($detail->order_date).' / '.substr($detail->order_time,0,5).' WIB'; ?></p>
                                    <p class="m-t-10"><strong>Order Status : </strong><span class="label label-warning"> <?php echo $detail->order_status; ?></span></p>
                                    <p class="m-t-10">
                                        <strong>Change Status : </strong>
                                        <select class="form-control" name="lstStatus">
                                            <option value="Open" <?php if ($detail->order_status == 'Open') { echo 'selected'; } ?>>Open</option>
                                            <option value="Process" <?php if ($detail->order_status == 'Process') { echo 'selected'; } ?>>Process</option>
                                            <option value="Shipping" <?php if ($detail->order_status == 'Shipping') { echo 'selected'; } ?>>Shipping</option>
                                            <option value="Closed" <?php if ($detail->order_status == 'Closed') { echo 'selected'; } ?>>Closed</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th>Product Name</th>
                                            <th width="30%">Category</th>
                                            <th width="10%">Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $total = 0;
                                        foreach($listItem as $i) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo ucwords(strtolower($i->product_name)); ?></td>
                                            <td><?php echo $i->category_name; ?></td>
                                            <td align="right"><?php echo $i->detail_qty; ?></td>
                                        </tr>
                                        <?php 
                                            $no++;
                                            $total = ($total+$i->detail_qty);
                                        } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3">
                                <address>
                                Shipping Address :<br>
                                <strong><?php echo ucwords(strtolower($detail->shipping_name)); ?></strong><br>
                                <?php echo ucwords(strtolower($detail->shipping_address)).' - '.ucwords(strtolower($detail->shipping_city)); ?><br>
                                <?php echo $detail->region_name.' - '.$detail->shipping_zipcode; ?><br>
                                <abbr title="Phone">P: </abbr> <?php echo $detail->shipping_phone; ?>
                                </address>
                            </div>
                            <div class="col-md-6">
                                <p class="text-left">
                                Comment :<br>
                                <?php echo $detail->order_comment; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-right"><b>Total Qty :</b> <?php echo $total; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="<?php echo site_url($this->uri->segment(5).'/'.'printinvoice/'.$detail->order_id); ?>" class="btn btn-inverse waves-effect waves-light" target="_blank"><i class="fa fa-print"></i></a>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>

        <a href="<?php echo site_url('admin/'.$this->uri->segment(2)); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Back</a>

    </div>
</div>