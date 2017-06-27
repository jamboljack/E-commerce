<div id="content" class="col-sm-9">
    <?php if ($this->uri->segment(1) == 'maincategory') { ?>
    <div class="slideshow single-slider owl-carousel">
        <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>img/maincategory/<?php echo $detail->maincategory_image; ?>" alt="<?php echo $detail->maincategory_name; ?>" /></a> </div>
    </div>
    <?php } ?>

    <h1 class="title"><?php echo $detail->maincategory_name; ?></h1>
    <div class="product-filter">
        <div class="row">
            <div class="col-md-7 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
            </div>
            <!--
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
            -->
        </div>
    </div>
    <br />
    <div class="row products-category">
        <?php foreach($listCategory as $p) { ?>
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image"><a href="<?php echo site_url('category/collection/'.$p->category_id.'/'.$p->category_name_seo); ?>"><img src="<?php echo base_url(); ?>img/category/<?php echo $p->category_image; ?>" alt="<?php echo ucwords(strtolower($p->category_name)); ?>" title="<?php echo ucwords(strtolower($p->category_name)); ?>" class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="<?php echo site_url('category/collection/'.$p->category_id.'/'.$p->category_name_seo); ?>"><?php echo ucwords(strtolower($p->category_name)); ?></a></h4>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>