<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="<?php echo base_url(); ?>" class="logo"><i class="icon-screen-desktop icon-c-logo"></i><span>KcFurnindo</span></a>
        </div>
    </div>
    
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><?php echo ucwords(strtolower($this->session->userdata('nama_admin'))); ?> <img src="<?php echo base_url(); ?>img/avatar.png" alt="user-img" class="img-circle"></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('admin/profile'); ?>"><i class="ti-user m-r-10 text-custom"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo site_url('administrator/logout'); ?>"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>