<aside id="column-left" class="col-sm-3 hidden-xs">
    <h3 class="subtitle">Categories</h3>
    <div class="box-category">
        <ul id="cat_accordion">
            <?php
            $listMainMenu   = $this->menu_model->select_main_category()->result(); 
            foreach($listMainMenu as $r) {
            ?>
            <li><a href="<?php echo site_url('maincategory/item/'.$r->maincategory_id.'/'.$r->maincategory_name_seo); ?>"><?php echo $r->maincategory_name; ?></a> 
                <?php 
                // Tampilkan Sub Category Level-1
                $maincategory_id        = $r->maincategory_id;
                $listSubCategory        = $this->menu_model->select_sub_category($maincategory_id)->result();
                if (count($listSubCategory) > 0) { // Jika Ada Sub Category, maka Tampilkan
                ?>
                <span class="down"></span>                
                <ul>
                    <?php 
                    foreach($listSubCategory as $l) {
                    ?>
                    <li><a href="<?php echo site_url('subcategory/item/'.$l->subcategory_id.'/'.$l->subcategory_name_seo); ?>"><?php echo $l->subcategory_name; ?></a> 
                    <?php 
                    // Tampilkan Sub Category Level-2
                    $subcategory_id     = $l->subcategory_id;
                    $listCategory         = $this->menu_model->select_category($subcategory_id)->result();
                    if (count($listCategory) > 0) { // Jika Ada Sub Category, maka Tampilkan
                    ?>
                    <span class="down"></span>
                        <ul>
                            <?php 
                            foreach($listCategory as $k) {
                            ?>
                            <li><a href="<?php echo site_url('category/item/'.$k->category_id.'/'.$k->category_name_seo); ?>" ><?php echo $k->category_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </li>
            <?php } ?>
        </ul>
    </div>    

    <h3 class="subtitle">Bestsellers</h3>
    <div class="side-item">
        <?php 
        $listBest       = $this->menu_model->select_best_product()->result();
        foreach($listBest as $b) { 
        ?>
        <div class="product-thumb clearfix">
            <div class="image"><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $b->product_image; ?>" alt="<?php echo ucwords(strtolower($b->product_name)); ?>" title="<?php echo ucwords(strtolower($b->product_name)); ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><?php echo ucwords(strtolower($b->product_name)); ?></a></h4>
                <p class="price"><span class="price-new"><?php echo $b->category_name; ?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>

    <h3 class="subtitle">Specials</h3>
    <div class="side-item">
        <?php 
        $listSpecial       = $this->menu_model->select_special_product()->result();
        foreach($listSpecial as $b) { 
        ?>
        <div class="product-thumb clearfix">
            <div class="image"><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $b->product_image; ?>" alt="<?php echo ucwords(strtolower($b->product_name)); ?>" title="<?php echo ucwords(strtolower($b->product_name)); ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><?php echo ucwords(strtolower($b->product_name)); ?></a></h4>
                <p class="price"><span class="price-new"><?php echo $b->category_name; ?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="list-group">
        <h3 class="subtitle">Our Brand</h3>
    </div>
    <div class="banner owl-carousel">
        <?php 
        $listBrand       = $this->menu_model->select_brand()->result();
        foreach($listBrand as $r) { 
        ?>
            <div class="item">
                <a href="<?php echo site_url('brand/id/'.$r->brand_id.'/'.$r->brand_name_seo); ?>"><img src="<?php echo base_url(); ?>img/brand/<?php echo $r->brand_image; ?>" alt="<?php echo $r->brand_name; ?>" class="img-responsive" width="100%" /></a>
            </div>
        <?php } ?>
    </div>

    <h3 class="subtitle">Latest</h3>
    <div class="side-item">
        <?php 
        $listNew       = $this->menu_model->select_new_product()->result();
        foreach($listNew as $b) { 
        ?>
        <div class="product-thumb clearfix">
            <div class="image"><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $b->product_image; ?>" alt="<?php echo ucwords(strtolower($b->product_name)); ?>" title="<?php echo ucwords(strtolower($b->product_name)); ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><?php echo ucwords(strtolower($b->product_name)); ?></a></h4>
                <p class="price"><span class="price-new"><?php echo $b->category_name; ?></span></p>
            </div>
        </div>
        <?php } ?>
    </div>
</aside>