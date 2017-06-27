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
                <h4 class="page-title">Users</h4>
                <br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Users List</b></h4>
                    <br>
                    <a href="<?php echo site_url('admin/users/adddata'); ?>">
                        <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-plus-circle"></i> Add Data</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Username</th>
                                <th>Name</th>
                                <th width="10%">Region</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Level</th>
                                <th width="10%">Status</th>
                                <th width="8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $user_username = $r->user_username;
                                if ($r->user_status == 'Active') {
                                    $status = '<span class="label label-success">Active</span>';
                                } else {
                                    $status = '<span class="label label-danger">Non Active</span>';
                                }

                                if ($r->user_level == 'Admin') {
                                    $level = '<span class="label label-warning">Admin</span>';
                                } else {
                                    $level = '<span class="label label-primary">Member</span>';
                                }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->user_username; ?></td>
                                <td><?php echo ucwords(strtolower($r->user_name)); ?></td>
                                <td><?php echo ucwords(strtolower($r->region_name)); ?></td>
                                <td><?php echo $r->user_phone; ?></td>
                                <td align="center"><?php echo $level; ?></td>
                                <td align="center"><?php echo $status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/users/editdata').'/'.$user_username; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit
                                        </button>
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