<div class="content">
    <div class="container">
         <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Invoices</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/invoices'); ?>">Invoices</a>
                    </li>
                    <li>
                        <a href="#">Detail Data Invoice</a>
                    </li>
                    <li class="active">
                        #<?php echo $this->uri->segment(4); ?>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-edit"></i> Detail Data Invoice</b></h4>
                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/invoices/updatedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="id" value="<?php echo $detail->invoice_id; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice No. #</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="invoice_no" value="<?php echo $detail->invoice_id; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="invoice_date" value="<?php echo date("d-m-Y", strtotime($detail->invoice_date)); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Invoice Due Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="invoice_due_date" value="<?php echo date("d-m-Y", strtotime($detail->invoice_tempo)); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status Payment</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="lstStatus" required autofocus>
                                        <option value="PAID" <?php if ($detail->invoice_status=='PAID') { echo 'selected'; } ?>>PAID</option>
                                        <option value="UNPAID" <?php if ($detail->invoice_status=='UNPAID') { echo 'selected'; } ?>>UNPAID</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <a href="<?php echo site_url('admin/invoices'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Back</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button>
                    <a href="<?php echo site_url('admin/printinvoice/id/'.$detail->invoice_id); ?>" class="btn btn-danger btn-custom waves-effect waves-light btn-sm" target="_blank"><i class="fa fa-print"></i> Print Invoice</a>

                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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
                            <div class="col-md-4">
                                <address>
                                Shipping Address :<br>
                                <strong><?php echo ucwords(strtolower($detail->shipping_name)); ?></strong><br>
                                <?php echo ucwords(strtolower($detail->shipping_address)).' - '.ucwords(strtolower($detail->shipping_city)); ?><br>
                                <?php echo $detail->negara.' - '.$detail->shipping_zipcode; ?><br>
                                <abbr title="Phone">P: </abbr> <?php echo $detail->shipping_phone; ?>
                                </address>
                            </div>
                            <div class="col-md-5">
                                <p class="text-left">
                                Comment :<br>
                                <?php echo $detail->order_comment; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-right"><b>Total Qty :</b> <?php echo $total; ?></p>
                                <hr>
                                <h3 class="text-right">Total : <?php echo number_format($detail->order_total); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>