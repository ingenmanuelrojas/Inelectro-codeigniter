 <header>
    <div class="header-top-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="header-top-left">
                                    <div class="header-logo">
                                        <a href="<?php echo base_url() ?>">
                                            <img src="<?php echo base_url() ?>public/administrador/img/logo-nuevo.png" alt="OurStore" style="width: 250px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start-Header-links -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="header-top-right">
                                    <div class="top-link-wrap">
                                        <div class="single-link hidden-xs" style="margin-top: 25px;">
                                            <div><a href="my-account.html"><span class="fa fa-facebook"></span></a></div>
                                            <div><a href="my-account.html"><span class="fa fa-instagram"></span></a></div>
                                            <div><a href="my-account.html"><span class="fa fa-linkedin"></span></a></div>
                                            <div><a href="my-account.html"><span class="fa fa-twitter"></span></a></div>
                                            <div><a href="my-account.html"><span class="fa fa-youtube"></span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- End-Header-links -->
                        </div>
                    </div>
                </div>
    <!--End-header-mid-area-->
    <!--Start-Mainmenu-area -->
    <div class="mainmenu-area hidden-sm hidden-xs">
        <div id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                        <div class="log-small"><a class="logo" href="<?php echo base_url() ?>"><img alt="OurStore" src="<?php echo base_url() ?>public/administrador/img/logo_sistema.png" style="width: 150px;"></a></div>
                        <div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <?php

                                        if ($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") {
                                            $active_home = "mainmenu_active";
                                            $active_nosotros = "";
                                            $active_productos = "";
                                            $active_contacto = "";
                                        }else if($this->uri->segment(1) == "nosotros"){
                                            $active_nosotros = "mainmenu_active";
                                            $active_home = "";
                                            $active_productos = "";
                                            $active_contacto = "";
                                        }else if($this->uri->segment(1) == "productos"){
                                            $active_productos = "mainmenu_active";
                                            $active_nosotros = "";
                                            $active_home = "";
                                            $active_contacto = "";
                                        }else if($this->uri->segment(1) == "contacto"){
                                            $active_contacto = "mainmenu_active";
                                            $active_productos = "";
                                            $active_nosotros = "";
                                            $active_home = "";
                                        }else{
                                            $active_home = "";
                                            $active_nosotros = "";
                                            $active_productos = "";
                                            $active_contacto = "";
                                        }
                                    ?>

                                    <li class="<?php echo $active_home ?>"><a href="<?php echo base_url() ?>home">Home</a>
                                    <li class="<?php echo $active_nosotros ?>"><a href="<?php echo base_url() ?>nosotros">Nosotros</a>
                                    <li class="<?php echo $active_productos ?>"><a href="<?php echo base_url() ?>productos">Productos</a>
                                    <li ><a href="<?php echo base_url() ?>frontend/CotizarController">Cotizar</a>
                                    <li class="<?php echo $active_contacto ?>"><a href="<?php echo base_url() ?>contacto">Contacto</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--End-Mainmenu-area-->
                <!--Start-Mobile-Menu-Area -->
                <div class="mobile-menu-area visible-sm visible-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li>
                                                <a href="index.html">Home</a>
                                                <ul>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                    <li><a href="index-4.html">Home 4</a></li>
                                                    <li><a href="index-5.html">Home 5</a></li>
                                                    <li><a href="index-6.html">Home 6</a></li>
                                                    <li><a href="index-7.html">Home 7</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="shop-grid.html">Men</a>
                                                <ul>
                                                    <li>
                                                        <a href="shop-grid.html">Clothing</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Jackets</a></li>
                                                            <li><a href="shop-grid.html">Blazers</a></li>
                                                            <li><a href="shop-grid.html">T-Shirts</a></li>
                                                            <li><a href="shop-grid.html">Collections</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="shop-grid.html">Dresses</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Evening</a></li>
                                                            <li><a href="shop-grid.html">Cocktail</a></li>
                                                            <li><a href="shop-grid.html">Footwear</a></li>
                                                            <li><a href="shop-grid.html">Sunglass</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="shop-grid.html">Handbags</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Bootees Bags</a></li>
                                                            <li><a href="shop-grid.html">Exclusive</a></li>
                                                            <li><a href="shop-grid.html">Jackets</a></li>
                                                            <li><a href="shop-grid.html">Furniture</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop-grid.html">Jewellery</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Earrings</a></li>
                                                            <li><a href="shop-grid.html">Braclets
        </a></li>
                                                            <li><a href="shop-grid.html">Nosepins</a></li>
                                                            <li><a href="shop-grid.html">SweaBangelsters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-grid.html">Women</a>
                                                <ul>
                                                    <li><a href="shop-grid.html">Clothing</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Jackets</a></li>
                                                            <li><a href="shop-grid.html">Blazers</a></li>
                                                            <li><a href="shop-grid.html">T-Shirts</a></li>
                                                            <li><a href="shop-grid.html">Collections</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop-grid.html">Dresses</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Evening</a></li>
                                                            <li><a href="shop-grid.html">Cocktail</a></li>
                                                            <li><a href="shop-grid.html">Footwear</a></li>
                                                            <li><a href="shop-grid.html">Sunglass</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop-grid.html">Handbags</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Bootees Bags</a></li>
                                                            <li><a href="shop-grid.html">Exclusive</a></li>
                                                            <li><a href="shop-grid.html">Jackets</a></li>
                                                            <li><a href="shop-grid.html">Furniture</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop-grid.html">Jewellery</a>
                                                        <ul>
                                                            <li><a href="shop-grid.html">Earrings</a></li>
                                                            <li><a href="shop-grid.html">Braclets
        </a></li>
                                                            <li><a href="shop-grid.html">Nosepins</a></li>
                                                            <li><a href="shop-grid.html">SweaBangelsters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-grid.html">Pages</a>
                                                <ul>
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                    <li><a href="my-account.html">My Account</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="single-product.html">Single Product</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                                    <li><a href="shop-list.html">Shop List</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop Right Sidbar</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End-Mobile-Menu-Area -->
            </header>
            <!--End-Header-area-->