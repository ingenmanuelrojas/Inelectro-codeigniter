<style>
    .single-banner-top{
        background: url("<?php echo base_url() ?>public/administrador/uploads/banners/new_<?php echo $banner_productos->image ?>") no-repeat top center / cover !important;
    }
</style>

<!--start-single-heading-banner-->
<div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="single-ban-top-content">
                    <p>Productos</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-single-heading-banner-->

<!--start-single-heading-->
<div class="signle-heading">
    <div class="container">
        <div class="row">
            <!--start-shop-head -->
            <div class="col-lg-12">
                <div class="shop-head-menu">
                    <ul>
                        <li><i class="fa fa-home"></i><a class="shop-home" href="<?php echo base_url() ?>"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                        <li class="shop-pro">Productos</li>
                    </ul>
                </div>
            </div>
            <!--end-shop-head-->
        </div>
    </div>
</div>
<!--end-single-heading-->

<!--start-shop-product-area-->
<div class="shop-product-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <!-- Left-Sidebar-start-->
                <div class="left-sidebar-title">
                    <h2>Categorias</h2>
                </div>
                <!-- Shop-Layout-start -->
                <div class="left-sidebar">
                    <div class="shop-layout">
                        <div class="layout-list">
                            <ul>
                                <?php foreach ($categorias as $categoria): ?>
                                    <li><a href="javascript:void" onclick="get_productos_categoria(<?php echo $categoria->id ?>)"><?php echo $categoria->nombre ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End-Left-Sidebar -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <!-- Shop-Product-View-start -->
                <div class="shop-product-view">
                    <!-- Shop Product Tab Area -->
                    <div class="product-tab-area">
                        <!-- Tab Bar -->
                        <div class="tab-bar">
                                <div class="sort-by col-md-2">
                                	<label for="">BUSCADOR</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="txt_buscador" id="txt_buscador" class="form-control" placeholder="Encuenta tu producto..." onkeyup="if(event.keyCode == 13) buscador()">
                                </div>
                        </div>
                        <!-- End-Tab-Bar -->
                        <!-- Tab-Content -->
                        <div class="col-md-12" id="capa_loading" style="display: none;">
                            <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                            <br>
                        </div>
                        <div class="tab-content">
                            <div id="shop-product" class="tab-pane active">
                                <div class="row" id="capa_productos">
                                    <?php foreach ($productos as $producto): ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-product shop-mar-bottom">
                                                <?php if ($producto->estatus == "Nuevo"){ 
                                                    $estado = "new";
                                                }else{
                                                    $estado = "popular";
                                                } ?>
                                                <div class="<?php echo $estado ?>"><?php echo $producto->estatus ?></div>
                                                <div class="product-img-wrap">
                                                    <a class="product-img" href="#"> <img src="<?php echo base_url() ?>public/administrador/uploads/productos/new_<?php echo $producto->image ?>" alt="product-image" /></a>
                                                    <div class="add-to-cart">
                                                        <a href="#" title="add to cart">
                                                            <div><i class="fa fa-shopping-cart"></i><span>Ver Detalles</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="product-content">
                                                        <a href="#"><h3 class="pro-name"><?php echo $producto->nombre ?></h3></a>
                                                        <p><?php echo $producto->categoria ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Shop Product Tab Area -->
                </div>
                <!-- End Shop Product View -->
            </div>
        </div>
    </div>
</div>
<!--shop-product-area-end-->

<script src="<?php echo base_url() ?>public/frontend/js/productos.js"></script>
