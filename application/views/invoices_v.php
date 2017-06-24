<div id="content" class="col-sm-9">
    <h1 class="title">Invoices List</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <td class="text-center" width="5%">#</td>
                <td class="text-center" width="10%">Invoice No.</td>
                <td class="text-center" width="10%">Invoice Date</td>
                <td class="text-center" width="10%">Order ID</td>
                <td class="text-center" width="20%">Order Date</td>
                <td class="text-center">Status Order</td>
                <td class="text-right" width="15%">Total</td>
                <td class="text-center">Status Invoice</td>
                <td width="5%"></td>
            </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach($listData as $r) {
                if ($r->invoice_status == 'PAID') {
                    $status = '<span class="label label-success">PAID</span>';
                } else {
                    $status = '<span class="label label-danger">UNPAID</span>';
                }

                if ($r->order_status == 'Open') {
                    $statusorder = '<span class="label label-warning">Open</span>';
                } elseif ($r->order_status == 'Process') {
                    $statusorder = '<span class="label label-danger">Process</span>';
                } elseif ($r->order_status == 'Shipping') {
                    $statusorder = '<span class="label label-success">Shipping</span>';
                } elseif ($r->order_status == 'Closed') {
                    $statusorder = '<span class="label label-info">Closed</span>';
                }
            ?>
            <tr>
                <td class="text-left"><?php echo $no; ?></td>
                <td class="text-center">#<?php echo $r->invoice_id; ?></td>
                <td class="text-center"><?php echo date("d-m-Y", strtotime($r->invoice_date)); ?></td>
                <td class="text-center">
                    <a href="<?php echo site_url('orders/detaildata/'.$r->order_id); ?>" title="Click for Detail">
                        #<?php echo $r->order_id; ?>
                    </a>
                </td>
                <td class="text-center"><?php echo date("d-m-Y", strtotime($r->order_date)).' '.$r->order_time; ?></td>
                <td class="text-center"><?php echo $statusorder; ?></td>
                <td class="text-right"><?php echo number_format($r->order_total); ?></td>
                <td class="text-center"><?php echo $status; ?></td>
                <td class="text-center">
                    <a class="btn btn-primary" data-toggle="tooltip" href="<?php echo site_url('admin/printinvoice/pdf/'.$r->invoice_id); ?>" data-original-title="Download"><i class="fa fa-download"></i></a>
                </td>
            </tr>
            <?php 
                $no++;
            } 
            ?>
            </tbody>
        </table>
    </div>
</div>