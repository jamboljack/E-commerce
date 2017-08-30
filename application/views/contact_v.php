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
    <div class="row">
        <div class="col-sm-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0946263196497!2d110.73343141419046!3d-6.63516949520207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71200ad6220719%3A0x65fe061b8d4e2bcc!2sKcFurnindo+Jepara!5e0!3m2!1sen!2sid!4v1499327601235" width="800" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>