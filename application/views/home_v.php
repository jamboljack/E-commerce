<div id="content" class="col-sm-9">
    <!-- Slideshow Start-->
    <div class="slideshow single-slider owl-carousel">
        <?php foreach($listSlider as $s) { ?>
        <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>img/slider/<?php echo $s->slider_image; ?>" alt="<?php echo $s->slider_name; ?>" /></a> </div>
        <?php } ?>
    </div>
    <!-- Slideshow End-->
                    <!-- Featured Product Start-->
                    <h3 class="subtitle">Featured</h3>
                    <div class="owl-carousel product_carousel">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-200x200.jpg" alt="Brand Fashion Cotton T-Shirt" title="Brand Fashion Cotton T-Shirt" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">Brand Fashion Cotton T-Shirt</a></h4>
                                <p class="price"><span class="price-new">$110.00</span><span class="price-old">$122.00</span><span class="saving">-10%</span></p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product End-->
                    <!-- Brand Logo Carousel Start-->
                    <div id="carousel" class="owl-carousel nxt">
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="Palm" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Sony" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="Canon" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Apple" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="HTC" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="Hewlett-Packard" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/apple_logo-100x100.jpg" alt="brand" class="img-responsive" /></a> </div>
                        <div class="item text-center"> <a href="#"><img src="image/product/canon_logo-100x100.jpg" alt="brand1" class="img-responsive" /></a> </div>
                    </div>
                    <!-- Brand Logo Carousel End -->
                </div>