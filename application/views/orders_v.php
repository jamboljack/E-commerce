<div id="content" class="col-sm-9">
    <h1 class="title">Orders History</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <td class="text-center" width="5%">#</td>
                <td class="text-center" width="15%">Order ID</td>
                <td class="text-center" width="20%">Order Date</td>
                <td class="text-center">Status</td>
                <td class="text-right" width="15%">Total</td>
                <td width="5%"></td>
            </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach($listData as $r) { 
                if ($r->order_status == 'Open') {
                    $status = '<span class="label label-warning">Open</span>';
                } elseif ($r->order_status == 'Process') {
                    $status = '<span class="label label-danger">Process</span>';
                } elseif ($r->order_status == 'Shipping') {
                    $status = '<span class="label label-success">Shipping</span>';
                } elseif ($r->order_status == 'Closed') {
                    $status = '<span class="label label-info">Closed</span>';
                }
            ?>
            <tr>
                <td class="text-left"><?php echo $no; ?></td>
                <td class="text-center">#<?php echo $r->order_id; ?></td>
                <td class="text-center"><?php echo date("d-m-Y", strtotime($r->order_date)).' '.$r->order_time; ?></td>
                <td class="text-center"><?php echo $status; ?></td>
                <td class="text-right"><?php echo number_format($r->order_total); ?></td>
                <td class="text-center">
                    <a class="btn btn-info" data-toggle="tooltip" href="<?php echo site_url('orders/detaildata/'.$r->order_id); ?>" data-original-title="View"><i class="fa fa-eye"></i></a>
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