<?php 
$detailKontak = $this->menu_model->select_contact()->row();
?>
<footer id="footer">
    <div class="fpart-first">
        <div class="container">
            <div class="row">
                <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h5>Contact Details</h5>
                <ul>
                    <li class="address"><i class="fa fa-map-marker"></i><?php echo $detailKontak->contact_address; ?></li>
                    <li class="mobile"><i class="fa fa-phone"></i><?php echo $detailKontak->contact_phone; ?></li>
                    <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="<?php echo site_url('contact'); ?>">Contact Us</a>
                    <li class="mobile"><i class="fa fa-whatsapp"></i>WA : <?php echo $detailKontak->contact_wa; ?></li>
                    <li class="mobile"><i class="fa fa-bbm"></i>PIN BBM : <?php echo $detailKontak->contact_bbm; ?></li>
                </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>Information</h5>
                <ul>
                    <li><a href="<?php echo site_url('about_us'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('faq'); ?>">FAQ</a></li>
                    <li><a href="<?php echo site_url('privacy_policy'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo site_url('term_condition'); ?>">Terms &amp; Conditions</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="fpart-second">
        <div class="container">
        <div id="powered" class="clearfix">
            <div class="powered_text pull-left flip">
                <p>KcFurnindo Jepara © 2017</p>
            </div>
            <div class="social pull-right flip"> 
                <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/facebook.png" alt="Facebook" title="Facebook">
                </a> 
                <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/twitter.png" alt="Twitter" title="Twitter">
                </a>
                <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/google_plus.png" alt="Google+" title="Google+">
                </a>
                <a href="#" target="_blank">
                    <img data-toggle="tooltip" src="image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest">
                </a>
                <a href="#" target="_blank">
                    <img data-toggle="tooltip" src="image/socialicons/rss.png" alt="RSS" title="RSS">
                </a>
            </div>
        </div>
    </div>
</div>
<div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>