<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/shortcut.png">
<title>KcFurnindo Jepara</title>
<meta property="og:title" content="KcFurnindo Jepara" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.kcfurnindojepara.com/" />
<meta property="og:image" content="http://www.kcfurnindojepara.com/img/logo-header.png" />
<meta name="keywords" content="Meubel, Ukir, Furniture, Jepara, Sofa, Bed, Wood, Bed Minimalis, Furniture Kayu, Kayu">
<meta name="description" content="Specialized in Wood Furniture And Sofa Jepara">
<meta name="Developer" content="Jama' Rochmad M. - 085640969727">
<meta name="Author" content="KcFurnindo Jepara">
<meta name="robots" content="all" />
<meta name="robots" content="index, follow" />
<meta name="Googlebot" content="index,follow" />
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/swipebox/src/css/swipebox.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
<!-- CSS Part End-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/594e5973e9c6d324a473721e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<body>
<div class="wrapper-wide">
    <?php echo $_header; ?>
    <div id="container">
        <div class="container">
            <?php if ($this->uri->segment(1) == '') { ?>
            <!--<div class="custom-feature-box row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_1">
                        <div class="title">Free Shipping</div>
                        <p>Free shipping on order over $1000</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_2">
                        <div class="title">Free Return</div>
                        <p>Free return in 24 hour after purchasing</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_3">
                        <div class="title">Gift Cards</div>
                        <p>Give the special perfect gift</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_4">
                        <div class="title">Reward Points</div>
                        <p>Earn and spend with ease</p>
                    </div>
                </div>
            </div> -->
            <?php } else { ?>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
                <?php 
                if ($this->uri->segment(1) == 'maincategory') { 
                    $maincategory_collect   = $detail->maincategory_collect; // Status Collect
                    if ($maincategory_collect == 1) {
                        $subfunction = 'collection';
                    } else {
                        $subfunction = 'item';
                    }
                ?>
                <li><a href="<?php echo site_url('maincategory/'.$subfunction.'/'.$detail->maincategory_id.'/'.$detail->maincategory_name_seo); ?>"><?php echo $detail->maincategory_name; ?></a></li>
                <?php 
                } elseif ($this->uri->segment(1) == 'subcategory') {
                    $maincategory_id        = $detail->maincategory_id; // Main Category
                    $main                   = $this->menu_model->select_detail_main($maincategory_id)->row(); // Data Main Category
                    $maincategory_collect   = $main->maincategory_collect; // Status Collect
                    if ($maincategory_collect == 1) {
                        $subfunction = 'collection';
                    } else {
                        $subfunction = 'item';
                    }
                ?>
                <li><a href="<?php echo site_url('maincategory/'.$subfunction.'/'.$main->maincategory_id.'/'.$main->maincategory_name_seo); ?>"><?php echo $main->maincategory_name; ?></a></li>
                <li><a href="<?php echo site_url('subcategory/item/'.$detail->subcategory_id.'/'.$detail->subcategory_name_seo); ?>"><?php echo $detail->subcategory_name; ?></a></li>
                <?php 
                } elseif ($this->uri->segment(1) == 'category') {
                    $subcategory_id     = $detail->subcategory_id; // Sub Category
                    $subcategory        = $this->menu_model->select_detail_subcategory($subcategory_id)->row(); // Data Sub Category
                    $maincategory_id    = $subcategory->maincategory_id; // Main Category
                    $main               = $this->menu_model->select_detail_main($maincategory_id)->row(); // Data Main Category
                    $maincategory_collect   = $main->maincategory_collect; // Status Collect
                    if ($maincategory_collect == 1) {
                        $subfunction = 'collection';
                    } else {
                        $subfunction = 'item';
                    }
                ?>
                <li><a href="<?php echo site_url('maincategory/'.$subfunction.'/'.$main->maincategory_id.'/'.$main->maincategory_name_seo); ?>"><?php echo $main->maincategory_name; ?></a></li>
                <li><a href="<?php echo site_url('subcategory/'.$subfunction.'/'.$subcategory->subcategory_id.'/'.$subcategory->subcategory_name_seo); ?>"><?php echo $subcategory->subcategory_name; ?></a></li>
                <li><a href="<?php echo site_url('category/'.$subfunction.'/'.$detail->category_id.'/'.$detail->category_name_seo); ?>"><?php echo $detail->category_name; ?></a></li>
                <?php 
                } elseif ($this->uri->segment(1) == 'product') { 
                    $category_id        = $detail->category_id; // Category
                    $category           = $this->menu_model->select_detail_category($category_id)->row(); // Data Category
                    $subcategory_id     = $category->subcategory_id; // Sub Category
                    $subcategory        = $this->menu_model->select_detail_subcategory($subcategory_id)->row(); // Data Sub Category
                    $maincategory_id    = $subcategory->maincategory_id; // Main Category
                    $main               = $this->menu_model->select_detail_main($maincategory_id)->row(); // Data Main Category
                    $maincategory_collect   = $main->maincategory_collect; // Status Collect
                    if ($maincategory_collect == 1) {
                        $subfunction = 'collection';
                    } else {
                        $subfunction = 'item';
                    }
                ?>
                <li><a href="<?php echo site_url('maincategory/'.$subfunction.'/'.$main->maincategory_id.'/'.$main->maincategory_name_seo); ?>"><?php echo $main->maincategory_name; ?></a></li>
                <li><a href="<?php echo site_url('subcategory/'.$subfunction.'/'.$subcategory->subcategory_id.'/'.$subcategory->subcategory_name_seo); ?>"><?php echo $subcategory->subcategory_name; ?></a></li>
                <li><a href="<?php echo site_url('category/'.$subfunction.'/'.$category->category_id.'/'.$category->category_name_seo); ?>"><?php echo $category->category_name; ?></a></li>
                <li><a href="<?php echo site_url('product/item/'.$detail->product_id.'/'.$detail->product_name_seo); ?>"><?php echo ucwords(strtolower($detail->product_name)); ?></a></li>
                <?php } if ($this->uri->segment(1) == 'contact') { ?>
                <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                <?php } if ($this->uri->segment(1) == 'login') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                <?php } if ($this->uri->segment(1) == 'register') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
                <?php } if ($this->uri->segment(1) == 'myaccount') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('myaccount'); ?>">My Account</a></li>
                <?php } if ($this->uri->segment(1) == 'changepassword') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('changepassword'); ?>">Change Password</a></li>
                <?php } if ($this->uri->segment(1) == 'payment') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('payment'); ?>">Payment Address</a></li>
                <?php } if ($this->uri->segment(1) == 'chart') { ?>
                <li><a href="#">Shopping Chart</a></li>
                <?php } if ($this->uri->segment(1) == 'checkout') { ?>
                <li><a href="<?php echo site_url('chart'); ?>">Shopping Chart</a></li>
                <li><a href="<?php echo site_url('checkout'); ?>">Checkout</a></li>
                <?php } if ($this->uri->segment(1) == 'orders') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('orders'); ?>">Orders History</a></li>
                <?php } if ($this->uri->segment(1) == 'invoices') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('invoice'); ?>">Invoices List</a></li>
                <?php } if ($this->uri->segment(1) == 'wishlist') { ?>
                <li><a href="#">Account</a></li>
                <li><a href="<?php echo site_url('wishlist'); ?>">Wish List</a></li>
                <?php 
                } if ($this->uri->segment(1) == 'menu') { // Menu
                ?>
                <li><a href="<?php echo site_url('menu/id/'.$detail->menu_id.'/'.$detail->menu_name_seo); ?>"><?php echo $detail->menu_name; ?></a></li>
                <?php } if ($this->uri->segment(1) == 'search') { ?>
                <li><a href="#">Search</a></li>
                <?php } if ($this->uri->segment(1) == 'brand') { ?>
                <li><a href="#">Our Brand</a></li>
                <li><a href="#"><?php echo $detail->brand_name; ?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $uri1 = $this->uri->segment(1);
                if ($uri1=='myaccount' || $uri1=='changepassword' || $uri1=='payment' || $uri1=='chart' || $uri1=='checkout'
                    || $uri1=='orders' || $uri1=='invoices' || $uri1=='wishlist') {
                    echo $_sidebar2; 
                } else {
                    echo $_sidebar; 
                }
                ?>                
                
                <!--Middle Part Start-->
                <?php echo $content; ?>
                <!--Middle Part End-->

            </div>
        </div>
    </div>
    <?php echo $_footer; ?>
<!--    <div id="facebook" class="fb-left sort-order-1">
        <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
        <div class="fb-page" data-href="https://www.facebook.com/kcfurnindo" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/kcfurnindo"><a href="https://www.facebook.com/kcfurnindo">KcFurnindo Jepara</a></blockquote>
            </div>
        </div>
        <div id="fb-root"></div>
        <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
    <div id="twitter_footer" class="twit-left sort-order-2">
        <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
        <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="141223653">Tweets by @</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
-->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript">
// Elevate Zoom for Product Page image
$("#zoom_01").elevateZoom({
    gallery:'gallery_01',
    cursor: 'pointer',
    galleryActiveClass: 'active',
    imageCrossfade: true,
    zoomWindowFadeIn: 500,
    zoomWindowFadeOut: 500,
    lensFadeIn: 500,
    lensFadeOut: 500,
    loadingIcon: '<?php echo base_url(); ?>assets/image/progress.gif'
    }); 
//////pass the images to swipebox
$("#zoom_01").bind("click", function(e) {
  var ez =   $('#zoom_01').data('elevateZoom');
    $.swipebox(ez.getGalleryList());
  return false;
});
</script>
<!-- JS Part End-->
</body>
</html>