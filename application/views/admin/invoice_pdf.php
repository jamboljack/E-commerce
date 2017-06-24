<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KcFurnindo - Invoice #<?php echo $this->uri->segment(4); ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/shortcut.png">

<style type="text/css">
table {
    border-collapse: collapse;
}
table {
    width: 100%;
}
th, tr {
    height: 30px;
}
th, tr, td {
    padding: 5px;
}
.none {
	border: 0px;
}
.garis {
    border-bottom: 1px solid #ddd;
}
.paid{
    text-align: center;
}
.head {
	background-color: #f5f5f5;
	font-weight:bold;
}
p {
	margin: 0 0 5px;
    line-height: 1.5;
}
.item {
	border: 1px solid black;
	width: 100%;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Raleway", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 700;
}
.h3, h3 {
    font-size: 24px;
}
.h1, .h2, .h3, h1, h2, h3 {
    margin-top: 20px;
    margin-bottom: 10px;
	line-height: 1.1;
	color: inherit;
}
body, input, button, select, textarea {
    font-family: "Open Sans", Verdana, Tahoma, serif;
    font-size: 14px;
    line-height: 1.5;
    color: #333333;
}
.text-right-sm {
    text-align: right;
}
.pull-sm-right {
    float: right;
}
.page {
	width: 21cm;
	min-height: 29.7cm;
	padding: 0cm;
	margin: 0.1cm auto;
	border: 0.3px #D3D3D3 none;
	border-radius: 2px;
	background: white;
}
address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.5;
}

</style>
</head>
<body>
<div class="page">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr class="garis">
            <td align="left">
                <img src="<?php echo base_url(); ?>img/logo/<?php echo $contact->contact_logo; ?>" title="KcFurnindo" /><br />
                <h3>Invoice #<?php echo $detail->invoice_id; ?></h3>
            </td>
            <td class="paid">
                <p><h3 style="color:#cc0000"><?php echo $detail->invoice_status; ?></h3></p>
                <p>Jatuh Tempo : <?php echo date("d-m-Y", strtotime($detail->invoice_tempo)); ?><br />
                <?php echo $bank->bank_name; ?><br />
                Nomor Rekening : <?php echo $bank->bank_no_account; ?><br />
                Atas Nama : <?php echo $bank->bank_owner; ?></p>
            </td>
        </tr>
        <tr class="none" >
            <td valign="top">
                <p><b>Untuk :</b>
                <address class="small-text"><?php echo ucwords(strtolower($detail->user_name)); ?><br />
                <?php echo ucwords(strtolower($detail->user_address)); ?><br />
                <?php echo ucwords(strtolower($detail->user_city)).' '.$detail->user_zipcode; ?><br />
                <?php echo ucwords(strtolower($detail->region_name)); ?></address>
                </p>
                <br /><br /><br />
                <p><b>Metode Bayar :</b><br />
                <span class="small-text">Bank Transfer</span></p>
            </td>
            <td valign="top" align="right">
                <p class="text-right-sm text-right-sm"><b>Dibayarkan Kepada :</b>
                <address class="small-text text-right-sm text-right-sm">
                <?php echo $contact->contact_name; ?><br />
                <?php echo $contact->contact_address; ?><br />
                <?php echo $contact->contact_city.' '.$contact->contact_zipcode; ?><br />
                <?php echo $contact->contact_region; ?><br />
                PHONE : <?php echo $contact->contact_phone; ?><br />
                SMS/WA : <?php echo $contact->contact_wa; ?>
                </address>
                </p>
                <br />
                <p class="text-right-sm text-right-sm"><b>Tanggal Invoice :</b><br />
                <span class="small-text"><?php echo date("d-m-Y", strtotime($detail->invoice_date)); ?></span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <table class="item">
    <thead>
        <tr class="head">
	       <td width="5%">#</td>
	       <td>Nama Produk</td>
	       <td width="30%">Kategori</td>
	       <td width="15%" class="text-right-sm">Jumlah</td>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no     = 1;
        $total  = 0;
        foreach($listItem as $r) { 
        ?>
        <tr class="garis">
	       <td><?php echo $no; ?></td>
            <td><?php echo ucwords(strtolower($r->product_name)); ?></td>
            <td><?php echo $r->category_name; ?></td>
            <td class="text-right-sm"><?php echo $r->detail_qty; ?></td>
        </tr>
        <?php 
        	$no++;
            $total = ($total+$r->detail_qty);
        } 
        ?>
        <tr class="garis">
            <td class="total-row text-right-sm" colspan="3" ><strong>Total Item</strong></td>
            <td class="total-row text-right-sm"><?php echo $total; ?></td>
        </tr>
        <tr class="garis">
            <td class="total-row text-right-sm" colspan="3"><strong>Total</strong></td>
            <td class="total-row text-right-sm"><b><?php echo number_format($detail->order_total); ?></b></td>
        </tr>
    </tbody>
    </table>
    <br />
    <p>Komentar : <?php echo $detail->order_comment; ?></p>
</div>
</body>
</html>