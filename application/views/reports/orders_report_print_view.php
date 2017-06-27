<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Orders</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/shortcut.png">
    <link href="<?php echo base_url(); ?>backadmin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
    <link href="<?php echo base_url(); ?>assets/invoice/overrides2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/invoice/styles2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/invoice/invoice2.css" rel="stylesheet">
</head>
<body>
<?php
if ($this->uri->segment(4) == 'all') {
    $status = 'SEMUA';
} else {
    $status = $this->uri->segment(4);
}
?>
<div class="container-fluid invoice-container">
    <div class="row">
        <div class="col-sm-12">
            <p align="center"><img src="<?php echo base_url(); ?>img/logo-header.png" title="KcFurnindo" /></p>
            <h4 align="center">Laporan Order</h4>
            <h5 align="center">Status : <?php echo $status; ?>, Periode : <?php echo date("d-m-Y", strtotime($this->uri->segment(5))); ?> s/d <?php echo date("d-m-Y", strtotime($this->uri->segment(6))); ?></h5>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-right btn-group btn-group-sm hidden-print">
                <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
            </div>
            <table class="table table-condensed">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Order No.</th>
                    <th width="10%" align="center">Date</th>
                    <th width="20%">Name</th>
                    <th>Address</th>
                    <th width="15%">Phone</th>
                    <th width="5%" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no     = 1;
            foreach($listData as $r) { 
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><b>#<?php echo $r->order_id; ?></b></td>
                <td><?php echo date("d-m-Y", strtotime($r->order_date)).'<br>'.substr($r->order_time,0,5).' WIB'; ?></td>
                <td><?php echo ucwords(strtolower($r->user_name)); ?></td>
                <td><?php echo ucwords(strtolower($r->user_address)).'<br>'.ucwords(strtolower($r->user_city)).' '.$r->user_zipcode; ?></td>
                <td><?php echo $r->user_phone; ?></td>
                <td align="center"><b><?php echo $r->order_status; ?></b></td>
            </tr>
            <?php 
                $no++;
            } 
            ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>