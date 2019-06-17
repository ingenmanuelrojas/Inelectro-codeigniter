
<section class="slider-area home-1">
    <div class="preview-1">
        <div id="ensign-nivoslider" class="slides">
            <?php $cont=1; foreach ($sliders as $slider): ?>
                <img src="<?php echo base_url() ?>public/administrador/uploads/sliders/new_<?php echo $slider->image ?>" alt="" title="#slider-direction-<?php echo $cont ?>" />
            <?php $cont++; endforeach ?>
        </div>
        <?php $conta=1; foreach ($sliders as $slider): ?>
            <div id="slider-direction-<?php echo $conta ?>" class="t-cn slider-direction slider-<?php echo $conta ?>">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-right">
                            <div class="slider-content">
                                <div class="layer-1-1">
                                    <h2 class="title1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay=".8s"><?php echo $slider->texto_1 ?> <span class="h-color"><?php echo $slider->texto_2 ?></span></h2>
                                </div>
                                <div class="layer-1-3 hidden-xs">
                                    <p class="title3 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1.5s" ><?php echo $slider->descripcion ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $conta++; endforeach ?>
    </div>
</section>











<!--Start-latest-products-wrap-->
<div class="latest-products-wrap padding-t">
    <div class="container">
        <div class="latest-content text-center">
            <div class="section-heading">
                <h3><span class="h-color">Últimos</span> Productos</h3>
            </div>
        </div>
        <div class="row">
            <div class="featured-carousel indicator">
                
                <?php foreach ($ultimos as $producto): ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-product">
                        <?php if ($producto->estatus == "Nuevo"){ 
                            $estado = "new";
                        }else{
                            $estado = "popular";
                        } ?>
                        <div class="<?php echo $estado ?>"><?php echo $producto->estatus ?></div>
                            <div class="product-img-wrap">
                                <a class="product-img" href="#"> <img src="<?php echo base_url() ?>public/administrador/uploads/productos/new_<?php echo $producto->image ?>" alt="<?php echo $producto->nombre ?>" /></a>
                                <div class="add-to-cart">
                                    <a href="#" title="add to cart">
                                        <div><i class="fa fa-eye"></i><span>Ver Detalles</span></div>
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
</div>
<!--End-latest-products-wrap-->




<style>
    .latest-trend-wrap{
       background: rgba(0, 0, 0, 0) url("<?php echo base_url() ?>public/administrador/uploads/banners/new_<?php echo $banner_porque->image ?>") no-repeat fixed left center
    }
</style>

    
<!--Start-latest-trend-area-->
<div class="latest-trend-wrap">
    <div class="bg-trend"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="trend-content">
                    <h3>¿Porque Elegirnos?</h3>
                    <p style="font-size: 18px;" class="text-justify"><?php echo $nosotros->porque_elegirnos ?></p>
                    <a class="shop-no" href="<?php echo base_url() ?>nosotros">Ver Más</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End-latest-trend-area-->







<div class="clear"></div>
<!--Start-banner-area-->
<div class="banner-area padding-t banner-dis11">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="single-banner banner-r-b">
                    <a href="<?php echo $promocion_1->link ?>"><img alt="Hi Guys" src="<?php echo base_url() ?>public/administrador/uploads/banners/new_<?php echo $promocion_1->image ?>" /></a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <div class="single-banner">
                    <a href="<?php echo $promocion_2->link ?>"><img alt="Hi Guys" src="<?php echo base_url() ?>public/administrador/uploads/banners/new_<?php echo $promocion_2->image ?>" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End-banner-area-->


            <!--Start-latest-products-wrap-->
<div class="latest-products-wrap padding-t">
    <div class="container">
        <div class="latest-content text-center">
            <div class="section-heading">
                <h3><span class="h-color">Más</span> Vendidos</h3>
            </div>
        </div>
        <div class="row">
            <div class="featured-carousel indicator">

                <?php foreach ($vendidos as $producto): ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-product">
                        <?php if ($producto->estatus == "Nuevo"){ 
                            $estado = "new";
                        }else{
                            $estado = "popular";
                        } ?>
                        <div class="<?php echo $estado ?>"><?php echo $producto->estatus ?></div>
                            <div class="product-img-wrap">
                                <a class="product-img" href="#"> <img src="<?php echo base_url() ?>public/administrador/uploads/productos/new_<?php echo $producto->image ?>" alt="<?php echo $producto->nombre ?>" /></a>
                                <div class="add-to-cart">
                                    <a href="#" title="add to cart">
                                        <div><i class="fa fa-eye"></i><span>Ver Detalles</span></div>
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
</div>
<!--End-latest-products-wrap-->


<div class="clear"></div>
<div class="clear"></div>
<!--Satar-business-policy-wrap-->
<div class="business-policy-wrap padding-t">
    <div class="container">
        <div class="row">
           <!--Satar-single-p-wrap-->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-p-wrap banner-r-b text-center">
                    <span><i class="fa fa-plane"></i></span>
                    <h4>FREE SHIPPING WORLDWIDE.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, veniam.</p>
                </div>
            </div>
            <!--end-single-p-wrap-->
            <!--Satar-single-p-wrap-->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-p-wrap banner-r-b text-center">
                    <span><i class="fa fa-life-ring"></i></span>
                    <h4>24/7 CUSTOMER SERVICE.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, veniam.</p>
                </div>
            </div>
            <!--end-single-p-wrap-->
            <!--Satar-single-p-wrap-->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-p-wrap banner-r-b text-center">
                    <span><i class="fa fa-money"></i></span>
                    <h4>100% MONEY BACK</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, veniam.</p>
                </div>
            </div>
            <!--end-single-p-wrap-->
            <!--Satar-single-p-wrap-->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="single-p-wrap text-center">
                    <span><i class="fa fa-clock-o"></i></span>
                    <h4>OPEN: 8:00AM - CLOSE: 20:00PM.</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, veniam.</p>
                </div>
            </div>
            <!--end-single-p-wrap-->
        </div>
    </div>
</div>
<!--End-business-policy-wrap-->

<!-- Start-banner-area-->
<div class="banner-area padding-t banner-dis">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="single-banner fullwide-ban">
                    <a href="#"><img alt="Hi Guys" src="<?php echo base_url() ?>public/administrador/uploads/banners/new_<?php echo $promocion_3->image ?>" /></a>
                </div>
            </div>
        </div>
    </div>
</div> 
<br>