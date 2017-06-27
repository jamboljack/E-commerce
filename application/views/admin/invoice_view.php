<!-- Notifikasi -->
<?php
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<!-- Notifikasi -->
<?php
if ($this->session->flashdata('notificationerror')) { ?>
<script>
    swal({
        title: "Error",
        text: "<?php echo $this->session->flashdata('notificationerror'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'error'
    });
</script>
<? } ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Invoices</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li class="active">
                        Invoices List
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Invoices List</b></h4>
                    <br>
                    <a href="<?php echo site_url('admin/invoices/adddata'); ?>">
                        <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-plus-circle"></i> Create Invoice</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Inv. No.</th>
                                <th width="10%">Date Inv.</th>
                                <th width="10%">Order No</th>
                                <th>Name</th>
                                <th width="13%">Total (IDR)</th>
                                <th width="5%">Status</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $invoice_id = $r->invoice_id;

                                if ($r->invoice_status == 'PAID') {
                                    $status = '<span class="label label-success">PAID</span>';
                                } else {
                                    $status = '<span class="label label-danger">UNPAID</span>';
                                }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b>#<?php echo $r->invoice_id; ?></b></td>
                                <td><?php echo date("d-m-Y", strtotime($r->invoice_date)); ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/orders/detaildata/'.$r->order_id); ?>">#<?php echo $r->order_id; ?></a>
                                </td>
                                <td>
                                    <?php echo ucwords(strtolower($r->user_name)); ?><br>
                                    <?php echo ucwords(strtolower($r->user_address)); ?>
                                </td>
                                <td align="right"><?php echo number_format($r->order_total); ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/invoices/editdata').'/'.$invoice_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Edit Data">
                                        <i class="icon-pencil"></i> Edit
                                        </button>
                                    </a>
                                    <a href="<?php echo site_url('admin/printinvoice/id/'.$r->invoice_id); ?>" class="btn btn-danger btn-custom waves-effect waves-light btn-xs" target="_blank"><i class="fa fa-print"></i> Print</a>
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
    </div>
</div>