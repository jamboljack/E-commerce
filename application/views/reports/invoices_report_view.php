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

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Invoices Report</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Reports</a>
                    </li>
                    <li class="active">
                        Invoices Report
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-search"></i> Criteria Invoices</b></h4>
                    <p class="text-muted m-b-30 font-13">Choose Criteria Invoices</p>
                    <form class="form-horizontal" role="form" action="<?php echo site_url('reports/invoices_report/search'); ?>" method="post"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-6">                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status Order *</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="lstStatus" required autofocus>
                                        <option value="all" <?php echo set_select('lstStatus', 'all'); ?>>- All Status -</option>
                                        <option value="PAID" <?php echo set_select('lstStatus', 'PAID'); ?>>PAID</option>
                                        <option value="UNPAID" <?php echo set_select('lstStatus', 'UNPAID'); ?>>UNPAID</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">From - To *</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="from" placeholder="dd-mm-yyyy" value="<?php echo set_value('from'); ?>" required />
                                            <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                            <input type="text" class="form-control" name="to" placeholder="dd-mm-yyyy" value="<?php echo set_value('to'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-search"></i> Search</button>

                    </form>
                </div>
            </div>
        </div>

        <?php if ($cari == 'on') { ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-search"></i> Invoices Report Result</b></h4>
                    <br>
                    <a href="<?php echo site_url('reports/invoices_report/'); ?>/preview/<?php echo $Rpt['Status']; ?>/<?php echo $Rpt['From']; ?>/<?php echo $Rpt['To']; ?>" target="_blank">
                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-sm" title="Print Report"><i class="fa fa-print"></i> Print
                        </button>
                    </a>
                    <br><br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Inv. No.</th>
                                <th width="10%">Date Inv.</th>
                                <th width="10%">Order No</th>
                                <th>Name</th>
                                <th width="10%">Total (IDR)</th>
                                <th width="5%">Status</th>
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
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b>#<?php echo $r->invoice_id; ?></b></td>
                                <td><?php echo date("d-m-Y", strtotime($r->invoice_date)); ?></td>
                                <td>#<?php echo $r->order_id; ?></td>
                                <td>
                                    <?php echo ucwords(strtolower($r->user_name)); ?><br>
                                    <?php echo ucwords(strtolower($r->user_address)); ?>
                                </td>
                                <td align="right"><?php echo number_format($r->order_total); ?></td>
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
        <?php } ?>

    </div>
</div>