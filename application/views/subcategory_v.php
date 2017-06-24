<div id="content" class="col-sm-9">
    <?php if ($this->uri->segment(1) == 'maincategory') { ?>
    <div class="slideshow single-slider owl-carousel">
        <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>img/subcategory/<?php echo $detail->subcategory_image; ?>" alt="<?php echo $detail->subcategory_name; ?>" /></a> </div>
    </div>
    <?php } ?>

    <h1 class="title"><?php echo $detail->subcategory_name; ?></h1>
    <div class="product-filter">
        <div class="row">
            <div class="col-md-7 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
            </div>
            <div class="col-sm-2 text-right">
                <label class="control-label" for="input-limit">Short by :</label>
            </div>
            <div class="col-sm-3 text-right">
                <select id="input-limit" class="form-control">
                    <option value="" selected="selected">Default</option>
                    <option value="">Name (A - Z)</option>
                    <option value="">Name (Z - A)</option>
                </select>
            </div>
        </div>
    </div>
    <br />
    <div class="row products-category">
        <?php foreach($listCategory as $p) { ?>
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image"><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $p->product_image; ?>" alt="<?php echo ucwords(strtolower($p->product_name)); ?>" title="<?php echo ucwords(strtolower($p->product_name)); ?>" class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><?php echo ucwords(strtolower($p->product_name)); ?></a></h4>
                        <?php if ($this->uri->segment(1) == 'subcategory') { ?>
                        <p class="price"><span class="price-new"><?php echo $p->category_name; ?></span></p>
                        <?php } else { ?>
                        <br>
                        <?php }?>
                    </div>
                    <div class="button-group">
                        <form action="<?php echo site_url('chart/addtochart'); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="product_id" value="<?php echo $p->product_id; ?>">
                        <input type="hidden" name="qty" value="1">
                        <button class="btn-primary" type="submit"><span>Add to Cart</span></button>
                        </form>
                        <div class="add-to-links">
                            <form action="<?php echo site_url('wishlist/addtowishlist'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="product_id" value="<?php echo $p->product_id; ?>">
                                <button type="submit" data-toggle="tooltip" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>