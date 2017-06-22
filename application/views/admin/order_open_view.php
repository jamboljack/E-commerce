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
            window.location.href="<?php echo site_url('admin/'.$this->uri->segment(2).'/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Transaction</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Transaction</a>
                    </li>
                    <li class="active">
                        Order List [Open]
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Order List [Open]</b></h4>
                    <br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Order No.</th>
                                <th width="10%">Date</th>
                                <th width="20%">Name</th>
                                <th>Address</th>
                                <th width="10%">Phone</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $order_id = $r->order_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><b>#<?php echo $r->order_id; ?></b></td>
                                <td><?php echo date("d-m-Y", strtotime($r->order_date)).'<br>'.substr($r->order_time,0,5).' WIB'; ?></td>
                                <td><?php echo ucwords(strtolower($r->user_name)); ?></td>
                                <td><?php echo ucwords(strtolower($r->user_address)); ?></td>
                                <td><?php echo $r->user_phone; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/order_open/detaildata').'/'.$order_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Detail Data">
                                        <i class="icon-pencil"></i> Detail
                                        </button>
                                    </a>
                                    <a onclick="hapusData(<?php echo $order_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
                                    </a>
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