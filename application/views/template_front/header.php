<?php 
$detailKontak = $this->menu_model->select_contact()->row();
?>
<div id="header">
    <nav id="top" class="htop">
        <div class="container">
            <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                <div class="pull-left flip left-top">
                    <div class="links">
                        <ul>
                            <li class="mobile"><i class="fa fa-phone"></i><?php echo $detailKontak->contact_phone; ?></li>
                            <li class="email"><a href="mailto:<?php echo $detailKontak->contact_email; ?>"><i class="fa fa-envelope"></i><?php echo $detailKontak->contact_email; ?></a></li>
                            <li><a href="#">Wish List (0)</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div id="top-links" class="nav pull-right flip">
                    <ul>
                        <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                        <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <header class="header-row">
        <div class="container">
            <div class="table-container">
                <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                    <div id="logo"><a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>img/logo-header.png" title="KcFurnindo" alt="KcFurnindo" /></a></div>
                </div>
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div id="cart">
                        <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
                            <span class="cart-icon pull-left flip"></span>
                            <span id="cart-total">0 item(s) in your chart</span>
                        </button>
                        <!--
                        <ul class="dropdown-menu">
                            <li>
                                <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="image/product/sony_vaio_1-50x50.jpg"></a></td>
                                        <td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></td>
                                        <td class="text-right">x 1</td>
                                        <td class="text-right">$902.00</td>
                                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="image/product/samsung_tab_1-50x50.jpg"></a></td>
                                        <td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a></td>
                                        <td class="text-right">x 1</td>
                                        <td class="text-right">$230.00</td>
                                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                </tbody>
                                </table>
                            </li>
                            <li>
                                <div>
                                    <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><strong>Sub-Total</strong></td>
                                            <td class="text-right">$940.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                                            <td class="text-right">$4.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>VAT (20%)</strong></td>
                                            <td class="text-right">$188.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Total</strong></td>
                                            <td class="text-right">$1,132.00</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p class="checkout"><a href="cart.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="checkout.html" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                                </div>
                            </li>
                        </ul>
                        -->
                    </div>
                </div>
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                    <form action="" method="post">
                        <div id="search" class="input-group">
                            <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                            <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="home_link" title="Home" href="<?php echo base_url(); ?>"><span>Home</span></a></li>
                    <?php
                    $listMainMenu   = $this->menu_model->select_main_menu()->result(); 
                    foreach($listMainMenu as $r) {
                    ?>
                    <li class="mega-menu dropdown"><a href="<?php echo site_url('maincategory/item/'.$r->category_id.'/'.$r->category_name_seo); ?>"><?php echo $r->category_name; ?></a>
                        <?php 
                        // Tampilkan Sub Category Level-1
                        $category_id    = $r->category_id;
                        $listLevel1     = $this->menu_model->select_menu_level_1($category_id)->result();
                        if (count($listLevel1) > 0) { // Jika Ada Sub Category, maka Tampilkan
                        ?>
                        <div class="dropdown-menu">
                            <?php 
                            foreach($listLevel1 as $l) {
                            ?>
                            <div class="column col-lg-2 col-md-3"><a href="<?php echo site_url('subcategory/item/'.$l->category_id.'/'.$l->category_name_seo); ?>"><?php echo $l->category_name; ?></a>
                                <?php 
                                // Tampilkan Sub Category Level-2
                                $category_id = $l->category_id;
                                $listLevel2 = $this->menu_model->select_menu_level_2($category_id)->result();
                                if (count($listLevel2) > 0) { // Jika Ada Sub Category, maka Tampilkan
                                ?>
                                <div>
                                    <ul>
                                        <?php 
                                        foreach($listLevel2 as $k) {
                                        ?>
                                        <li><a href="<?php echo site_url('category/item/'.$k->category_id.'/'.$k->category_name_seo); ?>" ><?php echo $k->category_name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } ?>    
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <li class="contact-link"><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>