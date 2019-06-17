            <footer class="footer-area">
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <!--footer-text-start-->
                                <h3 class="wedget-title">Sobre Nosotros</h3>
                                <div class="footer-top-content">
                                    <p class="des text-justify"><?php echo substr($nosotros->quienes_somos, 0,380) ?></p>
                                    <div class="footer-read-more">
                                        <a href="<?php echo base_url() ?>nosotros"">Ver Más</a>
                                         <span><i class="fa fa-long-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!--footer-account-area-start-->
                            <div class="footer-account-area footer-none">
                                <div class="col-md-4">
                                    <center>
                                        <h3 class="wedget-title">Links</h3>
                                        <div class="footer-top-content">
                                            <ul>
                                                <li><a href="<?php echo base_url() ?>home"">Home</a></li>
                                                <li><a href="<?php echo base_url() ?>nosotros"">Nosotros</a></li>
                                                <li><a href="<?php echo base_url() ?>productos"">Productos</a></li>
                                                <li><a href="<?php echo base_url() ?>cotizar"">Cotizar</a></li>
                                                <li><a href="<?php echo base_url() ?>contacto"">Contacto</a></li>
                                            </ul>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <!--footer-account-area-end-->
                            <!--footer-contact-info-start-->
                            <div class="footer-contact-info">
                                <div class="col-md-4">
                                    <h3 class="wedget-title">Contacto</h3>
                                    <div class="footer-contact">
                                        <p class="adress"><label>Dirección:</label><span class="ft-content"><?php echo $contacto->direccion ?></span></p>
                                        <p class="phone"><label>Teléfonos:</label><span class="ft-content phone-num"><span class="phone1"><?php echo $contacto->telefono ?></span></p>
                                        <p class="web"><label>Correos:</label><span class="ft-content web-site"><a href="mailto:<?php echo $contacto->correo ?> ?>"><?php echo $contacto->correo ?></a></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--footer-contact-info-end-->
                        </div>
                    </div>
                </div>
                <!--footer-top-area-end-->
                <!--footer-bottom-area-start-->
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="copy-right">
                                <center>
                                        <span> Copyright &copy; <a href="https://www.filecloudtechnology.com/">Filecloud Technology</a>. All Rights Reserved.</span>
                                </center>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--footer-bottom-area-end-->
            </footer>
            <!--End-footer-wrap-->

        </div>
        <!--End-main-wrapper-->
        <!--strat-Quickview-product -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <!-- modal-content-start-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <!-- product-images -->
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="<?php echo base_url() ?>public/frontend/images/single-p/m1.jpg">
                                    </div>
                                </div>
                                <!-- product-images -->
                                <!-- product-info -->
                                <div class="product-info">
                                    <h1>Sample Product</h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="normal-price">£333.00</span>
                                        </div>
                                    </div>
                                    <a href="shop-grid.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons">
                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-info -->
                            </div>
                            <!-- modal-product -->
                        </div>
                        <!-- modal-body -->
                    </div>
                    <!-- modal-content -->
                </div>
                <!-- modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>

        <!-- all js here -->
        <!-- jquery latest version -->
        <script src="<?php echo base_url() ?>public/frontend/js/vendor/jquery-1.12.0.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo base_url() ?>public/frontend/js/owl.carousel.min.js"></script>
        <!-- meanmenu.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.meanmenu.js"></script>
        <!-- nivo.slider.js -->
        <script src="<?php echo base_url() ?>public/frontend/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>public/frontend/lib/home.js" type="text/javascript"></script>
        <!-- jquery-ui js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery-ui.min.js"></script>
        <!-- scrollUp.min.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.scrollUp.min.js"></script>
        <!-- jquery.parallax.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.parallax.js"></script>
        <!-- sticky.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.sticky.js"></script>
        <!-- jquery.simpleGallery.min.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.simpleGallery.min.js"></script>
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.simpleLens.min.js"></script>
        <!-- countdown.min.js -->
        <script src="<?php echo base_url() ?>public/frontend/js/jquery.countdown.min.js"></script>
        <!-- isotope.pkgd.min -->
        <script src="<?php echo base_url() ?>public/frontend/js/isotope.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo base_url() ?>public/frontend/js/wow.min.js"></script>
        <!-- plugins js -->
        <script src="<?php echo base_url() ?>public/frontend/js/plugins.js"></script>
        <!-- main js -->
        <script src="<?php echo base_url() ?>public/frontend/js/main.js"></script>
    </body>

<!-- Mirrored from ourstore.infinitelayout.com/ourstore/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jun 2019 18:50:44 GMT -->
</html>