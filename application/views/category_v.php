<div id="content" class="col-sm-9">
    <?php if ($this->uri->segment(1) == 'maincategory') { ?>
    <div class="slideshow single-slider owl-carousel">
        <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>img/category/<?php echo $detail->category_image; ?>" alt="<?php echo $detail->category_name; ?>" /></a> </div>
    </div>
    <?php } ?>

    <h1 class="title"><?php echo $detail->category_name; ?></h1>
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
        <?php foreach($listProduct as $p) { ?>
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image"><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $p->product_image; ?>" alt="<?php echo ucwords(strtolower($p->product_name)); ?>" title="<?php echo ucwords(strtolower($p->product_name)); ?>" class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><?php echo ucwords(strtolower($p->product_name)); ?></a></h4>
                        <br>
                    </div>
                    <div class="button-group">
                        <a href="<?php echo site_url('chart/addtochart/'.$p->product_id.'/'.$p->product_name_seo); ?>"><button class="btn-primary" type="button"><span>Add to Cart</span></button></a>
                        <div class="add-to-links">
                            <a href="<?php echo site_url('whistlist/addtowhistlist/'.$p->product_id.'/'.$p->product_name_seo); ?>"><button type="button" data-toggle="tooltip" title="" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>