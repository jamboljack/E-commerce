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
<!-- Hapus -->
<script>
    function hapusData(order_id) {
        var id = order_id;
        swal({
            title: 'Anda Yakin ?',
            text: 'Data ini akan di Hapus !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('admin/orders/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Orders</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li class="active">
                        Orders List
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
                                <th width="8%">Action</th>
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
                                <td><?php echo ucwords(strtolower($r->user_address)).'<br>'.ucwords(strtolower($r->user_city)).' '.$r->user_zipcode; ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/orders/detaildata').'/'.$order_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Detail Data">
                                        <i class="icon-pencil"></i>
                                        </button>
                                    </a>
                                    <?php if ($r->order_status == 'Open') { ?>
                                    <a onclick="hapusData(<?php echo $order_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i></button>
                                    </a>
                                    <?php } ?>
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