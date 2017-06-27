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
                    <li class="address"><i class="fa fa-map-marker"></i><?php echo $detailKontak->contact_address; ?><br><?php echo $detailKontak->contact_city; ?><br><?php echo $detailKontak->contact_region; ?> - <?php echo $detailKontak->contact_zipcode; ?></li>
                    <li class="mobile"><i class="fa fa-phone"></i><?php echo $detailKontak->contact_phone; ?></li>
                    <li class="mobile"><i class="fa fa-whatsapp"></i>WA : <?php echo $detailKontak->contact_wa; ?></li>
                    <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="<?php echo site_url('contact'); ?>">Contact Us</a>
                    <li class="mobile"><i class="fa fa-support"></i><?php echo $detailKontak->contact_work; ?></li>
                </ul>
                </div>
                <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <h5>Information</h5>
                <ul>
                    <?php 
                    $listMenu = $this->menu_model->select_menu()->result();
                    foreach($listMenu as $m) {
                    ?>
                    <li><a href="<?php echo site_url('menu/id/'.$m->menu_id.'/'.$m->menu_name_seo); ?>"><?php echo $m->menu_name; ?></a></li>
                    <?php } ?>
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
                <?php 
                $listSocial = $this->menu_model->select_social()->result();
                foreach($listSocial as $s) {
                ?>
                <a href="http://<?php echo $s->social_url; ?>" target="_blank">
                    <img data-toggle="tooltip" src="<?php echo base_url(); ?>img/socialicons/<?php echo $s->social_icon; ?>" alt="<?php echo $s->social_name; ?>" title="<?php echo $s->social_name; ?>">
                </a> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>