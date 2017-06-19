<div id="content" class="col-sm-9">
    <h1 class="title">Contact Us</h1>
    <h3 class="subtitle">Our Location</h3>
    <div class="row">
        <div class="col-sm-4">
            <div class="contact-info">
                <div class="contact-info-icon"><i class="fa fa-map-marker"></i></div>
                <div class="contact-detail">
                    <h4><?php echo $detail->contact_name; ?></h4>
                    <address>
                    <?php echo $detail->contact_address; ?>,<br />
                    <?php echo $detail->contact_city; ?>,<br />
                    <?php echo $detail->contact_region; ?>,<br />
                    <?php echo $detail->contact_zipcode; ?>
                    </address>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="contact-info">
                <div class="contact-info-icon"><i class="fa fa-phone"></i></div>
                <div class="contact-detail">
                <h4>Telephone & Email</h4>
                Call : <?php echo $detail->contact_phone; ?><br>
                Whatsapp :<?php echo $detail->contact_wa; ?><br>
                E-Mail : <a href="mailto://<?php echo $detail->contact_email; ?>"><?php echo $detail->contact_email; ?></a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="contact-info">
                <div class="contact-info-icon"><i class="fa fa-clock-o"></i></div>
                <div class="contact-detail">
                <h4>Opening Times</h4>
                <?php echo $detail->contact_work; ?></div>
            </div>
        </div>
    </div>
</div>