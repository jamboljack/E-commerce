<?php 
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'slider') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = 'active';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'social') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = 'active';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'contact') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = '';
    $social         = '';
    $contact        = 'active';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'brand') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = 'active subdrop';
    $brand          = 'active';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'maincategory') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = 'active';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'category') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = 'active';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'product') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = 'active';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'order_open') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $order_open     = 'active';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'order_process') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $order_open     = '';
    $order_process  = 'active';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'order_shipping') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = 'active';
    $order_closed   = '';
    $users          = '';
} elseif ($uri == 'order_closed') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = 'active';
} else {
    $dashboard      = 'active';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $order_open     = '';
    $order_process  = '';
    $order_shipping = '';
    $order_closed   = '';
    $users          = '';
}
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
                <li>
                    <a href="<?php echo site_url('admin/home'); ?>" class="waves-effect <?php echo $dashboard; ?>"><i class="fa fa-home"></i> <span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $content; ?>"><i class="fa fa-tasks"></i> <span> Master Content </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $slider; ?>"><a href="<?php echo site_url('admin/slider'); ?>">Slider</a></li>
                        <li class="<?php echo $social; ?>"><a href="<?php echo site_url('admin/social'); ?>">Social Media</a></li>
                        <li class="<?php echo $contact; ?>"><a href="<?php echo site_url('admin/contact'); ?>">Contact Us</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $data; ?>"><i class="fa fa-database"></i> <span> Master Data </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $brand; ?>"><a href="<?php echo site_url('admin/brand'); ?>">Brand</a></li>
                        <li class="<?php echo $maincategory; ?>"><a href="<?php echo site_url('admin/maincategory'); ?>">Main Category</a></li>
                        <li class="<?php echo $subcategory; ?>"><a href="<?php echo site_url('admin/subcategory'); ?>">Sub Category</a></li>
                        <li class="<?php echo $category; ?>"><a href="<?php echo site_url('admin/category'); ?>">Category</a></li>
                        <li class="<?php echo $product; ?>"><a href="<?php echo site_url('admin/product'); ?>">Product</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $transaction; ?>"><i class="fa fa-edit"></i> <span> Transaction </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $order_open; ?>"><a href="<?php echo site_url('admin/order_open'); ?>">Orders [Open]</a></li>
                        <li class="<?php echo $order_process; ?>"><a href="<?php echo site_url('admin/order_process'); ?>">Orders [Process]</a></li>
                        <li class="<?php echo $order_shipping; ?>"><a href="<?php echo site_url('admin/order_shipping'); ?>">Orders [Shipping]</a></li>
                        <li class="<?php echo $order_closed; ?>"><a href="<?php echo site_url('admin/order_closed'); ?>">Orders [Closed]</a></li>
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