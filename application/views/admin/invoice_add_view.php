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
                        <a href="#">Create Invoices</a>
                    </li>
                    <li class="active">
                        Choose Order List
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Orders List</b></h4>
                    <br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Order No.</th>
                                <th width="12%">Date Order</th>
                                <th width="20%">Name</th>
                                <th>Address</th>
                                <th width="5%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $order_id = $r->order_id;
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
                                <td><b>#<?php echo $r->order_id; ?></b></td>
                                <td><?php echo date("d-m-Y", strtotime($r->order_date)).'<br>'.substr($r->order_time,0,5).' WIB'; ?></td>
                                <td><?php echo ucwords(strtolower($r->user_name)); ?></td>
                                <td><?php echo ucwords(strtolower($r->user_address)); ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/invoices/detaildatainvoice').'/'.$order_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Detail Data">
                                        <i class="icon-pencil"></i> Detail
                                        </button>
                                    </a>
                                    <form action="<?php echo site_url('admin/invoices/create'); ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                    <input type="hidden" name="email" value="<?php echo $r->user_username; ?>">
                                        <button type="submit" class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Create Invoice">
                                        <i class="fa fa-plus-circle"></i> Create
                                        </button>
                                    </form>
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
        </div>

        <a href="<?php echo site_url('admin/invoices'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Back</a>

    </div>
</div>