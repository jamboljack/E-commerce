<?php 
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $data           = '';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'slider') {
    $dashboard      = '';
    $data           = 'active subdrop';
    $slider         = 'active';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'contact') {
    $dashboard      = '';
    $data           = 'active subdrop';
    $slider         = '';
    $contact        = 'active';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'brand') {
    $dashboard      = '';
    $data           = 'active subdrop';
    $slider         = '';
    $contact        = '';
    $brand          = 'active';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'category') {
    $dashboard      = '';
    $data           = 'active subdrop';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = 'active';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'product') {
    $dashboard      = '';
    $data           = 'active subdrop';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = 'active';
    $transaction    = '';
    $orders         = '';
    $users          = '';
} elseif ($uri == 'orders') {
    $dashboard      = '';
    $data           = '';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $orders         = 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $data           = '';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = 'active';
} else {
    $dashboard      = 'active';
    $data           = '';
    $slider         = '';
    $contact        = '';
    $brand          = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $users          = '';
}
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
                <li>
                    <a href="<?php echo base_url(); ?>" class="waves-effect <?php echo $dashboard; ?>"><i class="fa fa-home"></i> <span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $data; ?>"><i class="fa fa-globe"></i> <span> Master Data </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $slider; ?>"><a href="<?php echo site_url('admin/slider'); ?>">Slider</a></li>
                        <li class="<?php echo $contact; ?>"><a href="<?php echo site_url('admin/contact'); ?>">Contact Us</a></li>
                        <li class="<?php echo $brand; ?>"><a href="<?php echo site_url('admin/brand'); ?>">Brand</a></li>
                        <li class="<?php echo $category; ?>"><a href="<?php echo site_url('admin/category'); ?>">Category</a></li>
                        <li class="<?php echo $product; ?>"><a href="<?php echo site_url('admin/product'); ?>">Product</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $transaction; ?>"><i class="fa fa-tasks"></i> <span> Transaction </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $orders; ?>"><a href="<?php echo site_url('admin/orders'); ?>">Orders List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/users'); ?>" class="waves-effect <?php echo $users; ?>"><i class="fa fa-users"></i> <span> Users </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>