<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                <p class="text-muted page-title-alt">Selamat Datang, <?php echo ucwords(strtolower($this->session->userdata('nama_admin'))); ?></p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="card-box widget-box-1 bg-white">
                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Status Order"></i>
                    <h4 class="text-dark">Order Open</h4>
                    <h2 class="text-primary text-center"><span data-plugin="counterup"><?php echo count($listOpen); ?></span></h2>
                    <p class="text-muted">Qty - Income : <?php echo !empty($Qty1->Qty)?$Qty1->Qty:0; ?> - <?php echo number_format($Total1->total); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="card-box widget-box-1 bg-white">
                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Status Order"></i>
                    <h4 class="text-dark">Order Process</h4>
                    <h2 class="text-pink text-center"><span data-plugin="counterup"><?php echo count($listProcess); ?></span></h2>
                    <p class="text-muted">Qty - Income : <?php echo !empty($Qty2->Qty)?$Qty2->Qty:0; ?> - <?php echo number_format($Total2->total); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="card-box widget-box-1 bg-white">
                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Status Order"></i>
                    <h4 class="text-dark">Order Shipping</h4>
                    <h2 class="text-success text-center"><span data-plugin="counterup"><?php echo count($listShipping); ?></span></h2>
                    <p class="text-muted">Qty - Income : <?php echo !empty($Qty3->Qty)?$Qty3->Qty:0; ?> - <?php echo number_format($Total3->total); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="card-box widget-box-1 bg-white">
                    <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Status Order"></i>
                    <h4 class="text-dark">Order Closed</h4>
                    <h2 class="text-warning text-center"><span data-plugin="counterup"><?php echo count($listClosed); ?></span></h2>
                    <p class="text-muted">Qty - Income : <?php echo !empty($Qty4->Qty)?$Qty4->Qty:0; ?> - <?php echo number_format($Total4->total); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="portlet">
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                        Last Orders
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet2" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="10%">Order No.</th>
                                        <th width="10%">Order Date</th>
                                        <th width="20%">Name</th>
                                        <th>Address</th>
                                        <th width="10%">Total</th>
                                        <th width="5%">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($listOrders as $r) {
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
                                        <td><?php echo $no; ?></td>
                                        <td><a href="<?php echo site_url('admin/orders/detaildata'.'/'.$r->order_id); ?>" title="Click for Detail">#<?php echo $r->order_id; ?></a></td>
                                        <td>
                                            <?php echo date("d-m-Y", strtotime($r->order_date)).'<br>'.substr($r->order_time,0,5).' WIB'; ?>
                                        </td>
                                        <td><?php echo ucwords(strtolower($r->user_name)); ?></td>
                                        <td><?php echo ucwords(strtolower($r->user_address)); ?></td>
                                        <td><?php echo number_format($r->order_total); ?></td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                    <?php 
                                        $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>