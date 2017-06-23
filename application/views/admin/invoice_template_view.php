<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KcFurnindo - Invoice #<?php echo $this->uri->segment(4); ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/shortcut.png">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>backadmin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
    <!-- Styling -->
    <link href="<?php echo base_url(); ?>assets/invoice/overrides.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/invoice/styles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet">
</head>
<body>
    
<div class="container-fluid invoice-container">
    <div class="row">
        <div class="col-sm-7">
            <p><img src="<?php echo base_url(); ?>img/logo/<?php echo $contact->contact_logo; ?>" title="KcFurnindo" /></p>
            <h3>Invoice #<?php echo $detail->invoice_id; ?></h3>
        </div>
        <div class="col-sm-5 text-center">
            <div class="invoice-status">
                <span class="unpaid"><?php echo $detail->invoice_status; ?></span>
            </div>
            <div class="small-text">
                Jatuh Tempo : <?php echo date("d-m-Y", strtotime($detail->invoice_tempo)); ?>
            </div>
            <div class="payment-btn-container" align="center">
                <p><?php echo $bank->bank_name; ?><br />
                Nomor Rekening : <?php echo $bank->bank_no_account; ?><br />
                Atas Nama : <?php echo $bank->bank_owner; ?></p>
            </div>
        </div>
    </div>
    <hr>    
    <div class="row">
        <div class="col-sm-6 pull-sm-right text-right-sm">
            <strong>Dibayarkan kepada :</strong>
            <address class="small-text">
            <?php echo $contact->contact_name; ?><br />
            <?php echo $contact->contact_address; ?><br />
            <?php echo $contact->contact_city.' '.$contact->contact_zipcode; ?><br />
            <?php echo $contact->contact_region; ?><br />
            PHONE : <?php echo $contact->contact_phone; ?><br />
            SMS/WA : <?php echo $contact->contact_wa; ?>
            </address>
        </div>
        <div class="col-sm-6">
            <strong>Untuk :</strong>
            <address class="small-text">
            <?php echo ucwords(strtolower($detail->user_name)); ?><br />
            <?php echo ucwords(strtolower($detail->user_address)); ?><br />
            <?php echo ucwords(strtolower($detail->user_city)).' '.$detail->user_zipcode; ?><br />
            <?php echo ucwords(strtolower($detail->region_name)); ?>
            </address>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <strong>Metode Bayar:</strong><br>
            <span class="small-text">
                Bank Transfer
            </span>
            <br /><br />
        </div>
        <div class="col-sm-6 text-right-sm">
            <strong>Tanggal Invoice :</strong><br>
                <span class="small-text">
                    <?php echo date("d-m-Y", strtotime($detail->invoice_date)); ?><br><br>
                </span>
            </div>
        </div>
        <br />    
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Item Invoice</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td width="5%" class="text-center"><strong>#</strong></td>
                                <td><strong>Nama Produk</strong></td>
                                <td width="30%"><strong>Kategori</strong></td>
                                <td width="15%" class="text-right"><strong>Jumlah</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no     = 1;
                            $total  = 0;
                            foreach($listItem as $r) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo ucwords(strtolower($r->product_name)); ?></td>
                                <td><?php echo $r->category_name; ?></td>
                                <td class="text-right"><?php echo $r->detail_qty; ?></td>
                            </tr>
                            <?php 
                                $no++;
                                $total = ($total+$r->detail_qty);
                            } 
                            ?>
                            <tr>
                                <td class="total-row text-right" colspan="3"><strong>Total Item</strong></td>
                                <td class="total-row text-right"><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td class="total-row text-right" colspan="3"><strong>Total</strong></td>
                                <td class="total-row text-right"><?php echo number_format($detail->order_total); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p>Komentar : <?php echo $detail->order_comment; ?></p>
        
        <div class="pull-right btn-group btn-group-sm hidden-print">
            <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <a href="<?php echo site_url('admin/printinvoice/pdf/'.$detail->invoice_id); ?>" class="btn btn-default"><i class="fa fa-download"></i> Download</a>
        </div>
        
    </div>

    <p class="text-center hidden-print"><a href="<?php echo site_url('admin/home'); ?>">&laquo; Kembali ke Admin Page</a></a></p>

</body>
</html>
