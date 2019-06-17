function get_productos_categoria(id) {
	$("#capa_loading").css('display', 'block');
	$.post(base_url+'frontend/ProductosController/get_productos_categoria', {
		id: id
	}, function(data) {
		registros = eval(data);
		html = "";
		$("#capa_loading").css('display', 'none');
		
		if (registros == "") {
			html+= `<div class="container"><h4>No existen productos para mostrar...</h4></div>`;
		}else{
			for (var i = 0;  i < registros.length;  i++) {
				if (registros[i]['estatus'] == "Nuevo") {
	    			estado = "new";
	    		} else{
	    			estado = "popular";
	    		}
				html+= `
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	                    <div class="single-product shop-mar-bottom">
	                        <div class="`+estado+`">`+registros[i]['estatus']+`</div>
	                        <div class="product-img-wrap">
	                            <a class="product-img" href="#"> <img src="`+base_url+`public/administrador/uploads/productos/new_`+registros[i]['image']+`" alt="product-image" /></a>
	                            <div class="add-to-cart">
	                                <a href="#" title="add to cart">
	                                    <div><i class="fa fa-shopping-cart"></i><span>Ver Detalles</span></div>
	                                </a>
	                            </div>
	                        </div>
	                        <div class="product-info text-center">
	                            <div class="product-content">
	                                <a href="#"><h3 class="pro-name">`+registros[i]['nombre']+`</h3></a>
	                                <p>`+registros[i]['categoria']+`</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				`;
			}
		}
		$('#capa_productos').fadeIn().html(html);
	});
}

function buscador() {
	$("#capa_loading").css('display', 'block');
	texto = $('#txt_buscador').val();
 	$.post(base_url+'frontend/ProductosController/buscador', {
 		texto: texto
 	}, function(data) {
		registros = eval(data);
		html = "";
		$("#capa_loading").css('display', 'none');
		
		if (registros == "") {
			html+= `<div class="container"><h4>No existen productos para mostrar...</h4></div>`;
		}else{
			for (var i = 0;  i < registros.length;  i++) {
				if (registros[i]['estatus'] == "Nuevo") {
	    			estado = "new";
	    		} else{
	    			estado = "popular";
	    		}
				html+= `
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	                    <div class="single-product shop-mar-bottom">
	                        <div class="`+estado+`">`+registros[i]['estatus']+`</div>
	                        <div class="product-img-wrap">
	                            <a class="product-img" href="#"> <img src="`+base_url+`public/administrador/uploads/productos/new_`+registros[i]['image']+`" alt="product-image" /></a>
	                            <div class="add-to-cart">
	                                <a href="#" title="add to cart">
	                                    <div><i class="fa fa-shopping-cart"></i><span>Ver Detalles</span></div>
	                                </a>
	                            </div>
	                        </div>
	                        <div class="product-info text-center">
	                            <div class="product-content">
	                                <a href="#"><h3 class="pro-name">`+registros[i]['nombre']+`</h3></a>
	                                <p>`+registros[i]['categoria']+`</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				`;
			}
		}

		$('#capa_productos').fadeIn().html(html);
 	});
}