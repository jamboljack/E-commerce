<div id="content" class="col-sm-9">
    <div itemscope itemtype="#">
    <h1 class="title" itemprop="name"><?php echo ucwords(strtolower($detail->product_name)); ?></h1>
        <div class="row product-info">
            <div class="col-sm-6">
                <div class="image">
                    <img class="img-responsive" itemprop="image" id="zoom_01" src="<?php echo base_url(); ?>img/product/<?php echo $detail->product_image; ?>" title="<?php echo ucwords(strtolower($detail->product_name)); ?>" alt="<?php echo ucwords(strtolower($detail->product_name)); ?>" data-zoom-image="<?php echo base_url(); ?>img/product/<?php echo $detail->product_image; ?>" />
                </div>
                <?php if (count($listImage) > 0) { ?>
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div>
                <div class="image-additional" id="gallery_01">
                    <!-- Perulangan Image Lain -->
                    <?php foreach($listImage as $i) { ?>
                    <a class="thumbnail" href="#" data-zoom-image="<?php echo base_url(); ?>img/product/<?php echo $i->image_file; ?>" data-image="<?php echo base_url(); ?>img/product/<?php echo $i->image_file; ?>" title=""> <img src="<?php echo base_url(); ?>img/product/<?php echo $i->image_file; ?>" title="" alt=""/></a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled description">
                    <li><a href="<?php echo site_url('maincategory/item/'.$detail->maincategory_id.'/'.$detail->maincategory_name_seo); ?>"><span itemprop="brand"><?php echo ucwords(strtolower($detail->maincategory_name)); ?></span></a></li>
                    <li><span itemprop="brand"><?php echo ucwords(strtolower($detail->product_name)); ?></span></li>
                    <li><b>Price :</b> <span itemprop="brand">Contact Us</span></li>
                    <li><b>Availability :</b> <span class="instock">In Stock</span></li>
                </ul>
                <div id="product">
                <h3 class="subtitle">Available Options</h3>
                    <div class="cart">
                        <div>
                            <div class="qty">
                                <label class="control-label" for="input-quantity">Qty</label>
                                <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                                <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                                <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                <div class="clear"></div>
                            </div>
                            <a href="<?php echo site_url('chart/addtochart/'.$detail->product_id.'/'.$detail->product_name_seo); ?>"><button type="button" id="button-cart" class="btn btn-primary btn-lg">Add to Cart</button></a>
                        </div>
                        <div>
                            <a href="<?php echo site_url('whistlist/addtowhistlist/'.$detail->product_id.'/'.$detail->product_name_seo); ?>"><button type="button" class="wishlist"><i class="fa fa-heart"></i> Add to Wish List</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
        </ul>
        <div class="tab-content">
            <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                    <?php echo $detail->product_desc; ?>
                </div>
            </div>
        </div>
        <h3 class="subtitle">Related Products</h3>
        <div class="owl-carousel related_pro">
            <?php
            $category_id    = $detail->category_id; // Category Product
            $product_id     = $detail->product_id; // ID Product
            $listOther      = $this->product_model->select_other_product($category_id, $product_id)->result();
            foreach($listOther as $p) {
            ?>
            <div class="product-thumb">
                <div class="image"><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $p->product_image; ?>" alt="<?php echo ucwords(strtolower($p->product_name)); ?>" title="<?php echo ucwords(strtolower($p->product_name)); ?>" class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="<?php echo site_url('product/item/'.$p->product_id.'/'.$p->product_name_seo); ?>"><?php echo ucwords(strtolower($p->product_name)); ?></a></h4>
                        <p class="price"><span class="price-new"><?php echo $p->category_name; ?></span></p>
                    </div>
                    <div class="button-group">
                        <a href="<?php echo site_url('chart/addtochart/'.$p->product_id.'/'.$p->product_name_seo); ?>"><button class="btn-primary" type="button"><span>Add to Cart</span></button></a>
                        <div class="add-to-links">
                            <a href="<?php echo site_url('whistlist/addtowhistlist/'.$p->product_id.'/'.$p->product_name_seo); ?>"><button type="button" data-toggle="tooltip" title="" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>