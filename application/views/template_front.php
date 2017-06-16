<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/shortcut.png">
<title>KcFurnindo Jepara</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <?php echo $_header; ?>

    <div id="container">
        
        <!-- Feature Box Start-->
        <div class="container">
            <div class="custom-feature-box row">
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
            </div>
        </div>
        <!-- Feature Box End-->
        
        <div class="container">
            <div class="row">
                <!-- Left Part Start-->
                <?php echo $_sidebar; ?>
                <!-- Left Part End-->
                <!--Middle Part Start-->
                <?php echo $content; ?>
                <!--Middle Part End-->
            </div>
        </div>

    </div>
  
    <?php echo $_footer; ?>

    <!-- Facebook Side Block Start -->
    <div id="facebook" class="fb-left sort-order-1">
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
    <!-- Facebook Side Block End -->
    <!-- Twitter Side Block Start -->
    <div id="twitter_footer" class="twit-left sort-order-2">
        <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
        <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">Tweets by @</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!-- Twitter Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>