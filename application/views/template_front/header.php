<div id="header">
    <nav id="top" class="htop">
        <div class="container">
            <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                <div class="pull-left flip left-top">
                    <div class="links">
                        <ul>
                            <li class="mobile"><i class="fa fa-phone"></i>+91 9898777656</li>
                            <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>
                            <li><a href="#">Wish List (0)</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div id="top-links" class="nav pull-right flip">
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <header class="header-row">
        <div class="container">
            <div class="table-container">
                <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                    <div id="logo"><a href="index.html"><img class="img-responsive" src="image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
                </div>
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div id="cart">
                        <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
                            <span class="cart-icon pull-left flip"></span>
                            <span id="cart-total">2 item(s) - $1,132.00</span>
                        </button>
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
                    </div>
                </div>
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                    <div id="search" class="input-group">
                        <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                        <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="home_link" title="Home" href="index.html"><span>Home</span></a></li>
                    <?php 
                    foreach($listMainMenu as $r) {
                    ?>
                    <li class="mega-menu dropdown"><a><?php echo $r->category_name; ?></a>
                        <?php 
                        // Tampilkan Sub Category Level-1
                        $category_id = $r->category_id;
                        $listLevel1 = $this->home_model->select_menu_level_1($category_id)->result();
                        if (count($listLevel1) > 0) { // Jika Ada Sub Category, maka Tampilkan
                        ?>
                        <div class="dropdown-menu">
                            <?php 
                            foreach($listLevel1 as $l) {
                            ?>
                            <div class="column col-lg-2 col-md-3"><a href="category.html"><?php echo $l->category_name; ?></a>
                                <div>
                                    <ul>
                                        <?php 
                                        // Tampilkan Sub Category Level-2
                                        $category_id = $l->category_id;
                                        $listLevel2 = $this->home_model->select_menu_level_2($category_id)->result();
                                        foreach($listLevel2 as $k) {
                                        ?>
                                        <li><a href="#" ><?php echo $k->category_name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <li class="contact-link"><a href="contact-us.html">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>