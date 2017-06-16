<div id="content" class="col-sm-9">
    <div class="slideshow single-slider owl-carousel">
        <?php foreach($listSlider as $s) { ?>
        <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>img/slider/<?php echo $s->slider_image; ?>" alt="<?php echo $s->slider_name; ?>" /></a> </div>
        <?php } ?>
    </div>
    <h3 class="subtitle">Featured</h3>
    <div class="owl-carousel product_carousel">
        <?php foreach($listFeatured as $f) { ?>
        <div class="product-thumb clearfix">
            <div class="image"><a href="<?php echo site_url('product/item/'.$f->product_id.'/'.$f->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $f->product_image; ?>" alt="<?php echo ucwords(strtolower($f->product_name)); ?>" title="<?php echo ucwords(strtolower($f->product_name)); ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="product.html"><?php echo ucwords(strtolower($f->product_name)); ?></a></h4>
                <p class="price"><span class="price-new"><?php echo $f->category_name; ?></span></p>
            </div>
            <div class="button-group">
                <a href="#"><button class="btn-primary" type="button"><span>Add to Cart</span></button></a>
                <div class="add-to-links">
                    <a href="#"><button type="button" data-toggle="tooltip" title="" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>