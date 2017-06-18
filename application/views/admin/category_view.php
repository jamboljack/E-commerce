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
    function hapusData(category_id) {
        var id = category_id;
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
            window.location.href="<?php echo site_url('admin/category/deletedata'); ?>"+"/"+id
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
                        Category
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Category List</b></h4>
                    <br>
                    <a href="<?php echo site_url('admin/category/adddata'); ?>">
                        <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-plus-circle"></i> Add Data</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Number</th>
                                <th width="15%">Main Category</th>
                                <th width="15%">Sub Category</th>
                                <th>Category Name</th>
                                <th width="10%">Order</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $category_id = $r->category_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->category_no; ?></td>
                                <td><?php echo $r->maincategory_name; ?></td>
                                <td><?php echo $r->subcategory_name; ?></td>
                                <td><?php echo $r->category_name; ?></td>
                                <td>
                                    <div align="center">
                                    <?php 
                                        if ($r->category_no == 1) { 
                                            echo ""; 
                                        } else {
                                        ?>
                                        <a href="<?php echo site_url('admin/category/up/'.$r->category_id.'/'.$r->category_no); ?>" title="Up">&uarr;</a> 
                                           &nbsp;&nbsp;&nbsp;&nbsp; 
                                        <?php } ?>
                                        <a href="<?php echo site_url('admin/category/down/'.$r->category_id.'/'.$r->category_no); ?>" title="Down">&darr;</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/category/editdata').'/'.$category_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit
                                        </button>
                                    </a>
                                    <a onclick="hapusData(<?php echo $category_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
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