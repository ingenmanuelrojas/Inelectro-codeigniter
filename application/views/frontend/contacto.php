<!--start-single-heading-banner-->
<div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="single-ban-top-content">
                    <p>Contacto</p>
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
                        <li class="shop-pro">Contacto</li>
                    </ul>
                </div>
            </div>
            <!--end-shop-head-->
        </div>
    </div>
</div>
<!--end-single-heading-->

<!--stay_in_touch_area_start-->
<div class="stay-touch-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="address-area add-con-2">
                    <div class="single-address">
                        <p><i class="fa fa-map-marker"></i> <strong class="stro">Dirección :</strong><br> <span class="add-tex"> <?php echo $contacto->direccion ?></span></p>
                    </div>
                    <div class="single-email">
                        <p><i class="fa fa-envelope-o"></i><strong class="emai-stro">Correo :</strong><br> <span class="email-tex"> <?php echo $contacto->correo ?></span></p>
                    </div>
                    <div class="customar-supp">
                        <p><i class="fa fa-phone"></i> <strong class="cus-stro">Teléfono :</strong><br> <span class="cus-tex"> <?php echo $contacto->telefono ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="touch-text touch-con2">
                    <h3>Contacto</h3>
                </div>
                <div class="smal-text">
                    <p><?php echo $contacto->descripcion ?></p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="touch-form">
                                    <span class="name">Nombre:</span><br>
                                    <input type="text" name="text"><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="touch-form">
                                    <span class="name">Teléfono:</span><br>
                                    <input type="text" name="text"><br>
                                </div>
                            </div><div class="col-md-6">
                                <div class="touch-form">
                                    <span class="name">Correo:</span><br>
                                    <input type="email" name="text"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="touch-textarea">
                                    <span class="name">Mensaje:</span><br>
                                    <textarea name="textarea" id="textarea" cols="89" rows="5"></textarea><br>
                                    <div class="continue-butt">
                                        <input class="hvr-underline-from-left" type="submit" value="Enviar Mensaje">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--stay_in_touch_area_End-->
<!--Start-footer-wrap-->
<!--contact-map-area-start-->
<div class="map-wrap">
    <div class="map-area">
        <div id="googleMap" style="width:100%;height:410px;"></div>
    </div>
</div>
<!--end-contact-map-area-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9PVYKr0fwtx4R9e7PTSj8qL1hhMU7My0"></script>
<script>
	function initialize() {
	  var mapOptions = {
		zoom: 15,
		scrollwheel: false,
		center: new google.maps.LatLng(55.86424, -4.25181)
	  };

	  var map = new google.maps.Map(document.getElementById('googleMap'),
		  mapOptions);

	  var marker = new google.maps.Marker({
		position: map.getCenter(),
		animation:google.maps.Animation.BOUNCE,
		icon: '<?php echo base_url() ?>public/frontend/img/puntero.png',
		map: map
	  });
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>