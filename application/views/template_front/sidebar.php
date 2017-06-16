<aside id="column-left" class="col-sm-3 hidden-xs">
    <h3 class="subtitle">Categories</h3>
    <div class="box-category">
        <ul id="cat_accordion">
            <?php 
            foreach($listMainMenu as $r) {
            ?>
            <li><a href="<?php echo site_url('maincategory/'.$r->category_id.'/'.$r->category_name_seo); ?>"><?php echo $r->category_name; ?></a> 
                <?php 
                // Tampilkan Sub Category Level-1
                $category_id    = $r->category_id;
                $listLevel1     = $this->home_model->select_menu_level_1($category_id)->result();
                if (count($listLevel1) > 0) { // Jika Ada Sub Category, maka Tampilkan
                ?>
                <span class="down"></span>                
                <ul>
                    <?php 
                    foreach($listLevel1 as $l) {
                    ?>
                    <li><a href="<?php echo site_url('subcategory/'.$l->category_id.'/'.$l->category_name_seo); ?>"><?php echo $l->category_name; ?></a> 
                    <?php 
                    // Tampilkan Sub Category Level-2
                    $category_id = $l->category_id;
                    $listLevel2 = $this->home_model->select_menu_level_2($category_id)->result();
                    if (count($listLevel2) > 0) { // Jika Ada Sub Category, maka Tampilkan
                    ?>
                    <span class="down"></span>
                        <ul>
                            <?php 
                            foreach($listLevel2 as $k) {
                            ?>
                            <li><a href="<?php echo site_url('category/'.$k->category_id.'/'.$k->category_name_seo); ?>" ><?php echo $k->category_name; ?></a></li>
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
            <div class="image"><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $b->product_image; ?>" alt="<?php echo $b->product_name; ?>" title="<?php echo $b->product_name; ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><?php echo $b->product_name; ?></a></h4>
            </div>
        </div>
        <?php } ?>
    </div>

    <h3 class="subtitle">Specials</h3>
    <div class="side-item">
        <?php 
        $listBest       = $this->menu_model->select_best_product()->result();
        foreach($listBest as $b) { 
        ?>
        <div class="product-thumb clearfix">
            <div class="image"><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><img src="<?php echo base_url(); ?>img/product/<?php echo $b->product_image; ?>" alt="<?php echo $b->product_name; ?>" title="<?php echo $b->product_name; ?>" class="img-responsive" /></a></div>
            <div class="caption">
                <h4><a href="<?php echo site_url('product/item/'.$b->product_id.'/'.$b->product_name_seo); ?>"><?php echo $b->product_name; ?></a></h4>
            </div>
        </div>
        <?php } ?>
    </div>
    <h3 class="subtitle">Latest</h3>
    <div class="side-item">
        <div class="product-thumb clearfix">
            <div class="image"><a href="product.html"><img src="image/product/iphone_6-50x50.jpg" alt="Hair Care Cream for Men" title="Hair Care Cream for Men" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">Hair Care Cream for Men</a></h4>
                                <p class="price"> $134.00 </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                    </div>
                </aside>