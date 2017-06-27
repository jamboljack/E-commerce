<?php 
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'slider') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = 'active';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'social') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = 'active';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'contact') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = '';
    $social         = '';
    $contact        = 'active';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'bank') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = 'active';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'menu') {
    $dashboard      = '';
    $content        = 'active subdrop';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = 'active';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'brand') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = 'active subdrop';
    $brand          = 'active';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'maincategory') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = 'active';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'category') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = 'active';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'product') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = 'active subdrop';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = 'active';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'orders') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $orders         = 'active';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'invoices') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = 'active subdrop';
    $orders         = '';
    $invoices       = 'active';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'orders_report') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = 'active subdrop';
    $orders_report  = 'active';
    $invoices_report= '';
    $users          = '';
} elseif ($uri == 'invoices_report') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = 'active subdrop';
    $orders_report  = '';
    $invoices_report= 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
    $users          = 'active';
} else {
    $dashboard      = 'active';
    $content        = '';
    $slider         = '';
    $social         = '';
    $contact        = '';
    $bank           = '';
    $menu           = '';
    $data           = '';
    $brand          = '';
    $maincategory   = '';
    $subcategory    = '';
    $category       = '';
    $product        = '';
    $transaction    = '';
    $orders         = '';
    $invoices       = '';
    $report         = '';
    $orders_report  = '';
    $invoices_report= '';
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
                        <li class="<?php echo $bank; ?>"><a href="<?php echo site_url('admin/bank'); ?>">Bank</a></li>
                        <li class="<?php echo $menu; ?>"><a href="<?php echo site_url('admin/menu'); ?>">Menu</a></li>
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
                        <li class="<?php echo $orders; ?>"><a href="<?php echo site_url('admin/orders'); ?>">Orders</a></li>
                        <li class="<?php echo $invoices; ?>"><a href="<?php echo site_url('admin/invoices'); ?>">Invoices</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $report; ?>"><i class="fa fa-file"></i> <span> Report </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $orders_report; ?>"><a href="<?php echo site_url('reports/orders_report'); ?>">Orders Report</a></li>
                        <li class="<?php echo $invoices_report; ?>"><a href="<?php echo site_url('reports/invoices_report'); ?>">Invoices Report</a></li>
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