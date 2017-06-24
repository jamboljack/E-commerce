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
                <h4><a href="<?php echo site_url('product/item/'.$f->product_id.'/'.$f->product_name_seo); ?>"><?php echo ucwords(strtolower($f->product_name)); ?></a></h4>
                <p class="price"><span class="price-new"><?php echo $f->category_name; ?></span></p>
            </div>
            <div class="button-group">
                <form action="<?php echo site_url('chart/addtochart'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="product_id" value="<?php echo $f->product_id; ?>">
                <input type="hidden" name="qty" value="1">
                <button class="btn-primary" type="submit"><span>Add to Cart</span></button>
                </form>
                <div class="add-to-links">
                    <form action="<?php echo site_url('wishlist/addtowishlist'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="product_id" value="<?php echo $f->product_id; ?>">
                        <button type="submit" data-toggle="tooltip" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>