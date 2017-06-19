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
<!-- Hapus Data -->
<script>
    function hapusData(product_id) {
        var id = product_id;
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
            window.location.href="<?php echo site_url('admin/product/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Master Data</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Master Data</a>
                    </li>
                    <li class="active">
                        Product
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Product List</b></h4>
                    <br>
                    <a href="<?php echo site_url('admin/product/adddata'); ?>">
                        <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-plus-circle"></i> Add Data</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Product Name</th>
                                <th width="20%">Category</th>
                                <th width="10%">Collection</th>
                                <th width="10%">Status</th>
                                <th width="10%">Image</th>
                                <th width="5%">Other</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $product_id = $r->product_id;
                                $Best       = ($r->product_best==1?'Best':'');
                                $New        = ($r->product_new==1?'New':'');
                                $Special    = ($r->product_special==1?'Special':'');
                                $Collect    = !empty($r->collection)?$r->collection:'-';
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo ucwords(strtolower($r->product_name)); ?></td>
                                <td><?php echo $r->maincategory_name.' <i class="fa fa-angle-right"></i> '.$r->subcategory_name.' <i class="fa fa-angle-right"></i> '.$r->category_name; ?></td>
                                <td><?php echo $Collect; ?></td>
                                <td><?php echo $Best.' '.$New.' '.$Special; ?></td>
                                <td align="center">
                                    <?php 
                                    if (empty($r->product_image)) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>img/noproduct.jpg" width="50%">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>img/product/<?php echo $r->product_image; ?>" width="50%">
                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <a href="<?php echo site_url('admin/product/listimage/'.$product_id); ?>" title="Other Image Product"><i class="fa fa-image"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/product/editdata').'/'.$product_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit
                                        </button>
                                    </a>
                                    <a onclick="hapusData(<?php echo $product_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
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