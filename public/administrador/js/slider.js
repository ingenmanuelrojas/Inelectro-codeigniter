function save_slider() {
	if ($("#txt_file").val() == "" || $("#txt_orden").val() == 0 || $("#txt_texto_1").val() == ""  || $("#txt_texto_2").val() == ""  || $("#txt_descripcion").val() == "" ) {
		alertify.alert("Mensaje Advertencia", "Debe llenar todos los campos.");
	}else{
		$(".loading").css('display', 'block');
		datos = new FormData($("#frm_slider")[0]);
		$.ajax({
			url: base_url_admin+'slider/save',
			type: 'post',
			dataType: 'json',
			data: datos,
			contentType: false,
	        processData: false,
			success: function(data){
				var datos = jQuery.parseJSON(JSON.stringify(data));
				if (datos.resp == true) {
					alertify.set('notifier','position', 'top-center');
		    		alertify.success(datos.mensaje);
		    		$(".loading").css('display', 'none');
		    		getAll();
		    		$('#frm_slider')[0].reset();
				}else{
					alertify.set('notifier','position', 'top-center');
		    		alertify.error(datos.mensaje);
		    		$(".loading").css('display', 'none');
				}
			}
		});
	}
}

function getAll() {
	$(".loading").css('display', 'block');
	$.post(base_url_admin+'slider/getAll', function(data) {
		$(".loading").css('display', 'none');
		registros = eval(data);
		html = "";
		if (registros == "") {
			html += `
				<div class="col-md-12">
					<h5>No existen registros para mostrar...</h5>
				</div>
			`;
		}else{
			for (var i = 0;  i < registros.length;  i++) {
				html += `
					<div class="col-md-6">
	                    <a href="#" class="thumbnail">
	                      	<img src="`+ base_url3 +`public/administrador/uploads/sliders/new_` + registros[i]['image'] + `" alt="...">
	                      	<br>
	                      	<center>
	                        <h5>` + registros[i]['orden'] + `</h5>
	                        <p>` + registros[i]['texto_1'] + ` - ` + registros[i]['texto_2'] + `</p>
	                        <p>` + registros[i]['descripcion'] + `</p>
	                        <button type="button" class="btn btn-danger" onclick="eliminar_imagen(` + registros[i]['id'] + `)">Eliminar</button>
	                      </center>
	                    </a>
                  	</div> `;
			}
		}
		$('#capa_sliders').html(html);
    });
}

function eliminar_imagen(id) {
	alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
	alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar el Slider?', function(){
		$.post(base_url_admin+'slider/delete', {
			id: id
		}, function(data) {
			var datos = JSON.parse(data);

			if (datos.resp == true) {
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
	    		getAll();
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
			}
		});
	}, function(){ 
		alertify.error('Cancelaste la operación.');
	});
}