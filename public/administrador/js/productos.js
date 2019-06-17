function nuevo_producto() {
	op = 'guardar';
  	$('#frm_productos')[0].reset();
  	$('#modal_productos').modal('show');
    $('.modal-title').text('Nuevo Producto');
    $('#errores').css('display','none');
    CKEDITOR.instances['txt_caracteristicas'].setData("");
}

function buscar_galeria(id) {
  	$('#frm_galeria')[0].reset();
  	$('#modal_galeria').modal('show');
    $('.modal-title').text('Galeria de Imágenes');
    $('#errores').css('display','none');
    $('#txt_id_prod').val(id);

    getAllGaleria(id);
}

function adjuntar_imagen(){

	if ($("#txt_file").val() == "" || $("#txt_orden").val() == 0 ) {
		alertify.alert("Mensaje Advertencia", "Debe llenar todos los campos.");
	}else{
		$("#capa_loading").css('display', 'block');
		datos = new FormData($("#frm_galeria")[0]);
		$.ajax({
			url: base_url_admin+'productos/adjuntar',
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
		    		$("#capa_loading").css('display', 'none');
		    		getAllGaleria($("#txt_id_prod").val());
		    		$('#frm_galeria')[0].reset();
				}else{
					alertify.set('notifier','position', 'top-center');
		    		alertify.error(datos.mensaje);
		    		$("#capa_loading").css('display', 'none');
				}
			}
		});
	}
}

function save_producto() {
	if ($('#txt_nombre').val() == "" || $('#cmb_categoria').val() == "" || $('#cmb_estatus').val() == "" || $('#txt_desc_corta').val() == "" || $('#txt_desc_larga').val() == "" || CKEDITOR.instances['txt_caracteristicas'].getData() == "") {
		alertify.alert("Mensaje de Advertencia", "Debes llenar todos los campos obligatorios.");
	}else{
		var url_modulo = "";
		id="";
		if (op == "guardar") {
			url_modulo = base_url_admin+'productos/store';
			id = "";
		}else if(op == "editar"){
			id = $('#txt_id').val();
			url_modulo = base_url_admin+'productos/update';
		}
		$.post(url_modulo, {
			id                  : id,
			txt_nombre          : $('#txt_nombre').val(),
			cmb_categoria       : $('#cmb_categoria').val(),
			cmb_estatus         : $('#cmb_estatus').val(),
			txt_desc_corta      : $('#txt_desc_corta').val(),
			txt_desc_larga      : $('#txt_desc_larga').val(),
			txt_caracteristicas : CKEDITOR.instances['txt_caracteristicas'].getData()
		}, function(data) {
			var datos = JSON.parse(data);

			if (datos.resp == true) {
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
	    		$('#modal_productos').modal('hide');
	    		getAll();
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
			}
		});
	}
}

function buscar_producto(id) {
	$('#frm_productos')[0].reset();
	$.post(base_url_admin+'productos/search', {
		id: id
	}, function(data) {
		var datos = JSON.parse(data);
		op = 'editar';
		$('#txt_id').val(datos.id);
        $('#txt_nombre').val(datos.nombre);
        $('#cmb_categoria').val(datos.id_categoria);
        $('#cmb_estatus').val(datos.estatus);
        $('#txt_desc_corta').val(datos.descripcion_corta);
        $('#txt_desc_larga').val(datos.descripcion_larga);
        CKEDITOR.instances['txt_caracteristicas'].setData(datos.caracteristicas);

        $('.modal-title').text('Editar Producto');
	});
}

function delete_producto(id) {
 	alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
	alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar el registro?', function(){
		$.post(base_url_admin+'productos/delete', {
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

function eliminar_imagen(id, id_prod) {
	alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
	alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar la Imágen?', function(){
		$.post(base_url_admin+'productos/delete_image', {
			id: id
		}, function(data) {
			var datos = JSON.parse(data);

			if (datos.resp == true) {
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
	    		getAllGaleria(id_prod);
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
			}
		});
	}, function(){ 
		alertify.error('Cancelaste la operación.');
	});
}

function getAll() {
	$.post(base_url_admin+'productos/getAll', function(data) {
		registros = eval(data);
		
    	html=`
			<table class="table table-bordered table-hover table-condensed data_table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Categoría</th>
						<th>Estatus</th>
						<th>Fecha/Hora</th>
						<th>Opciones</th>
					</tr>
					</thead>
					<tbody>
		`;
     	var cont = 1;
		for (var i = 0;  i < registros.length;  i++) {
			html+='<tr><td>'+cont+'</td>';
			html+='<td>'+registros[i]['nombre']+'</td>';
			html+='<td>'+registros[i]['descripcion_corta']+'</td>';
			html+='<td>'+registros[i]['categoria']+'</td>';
			html+='<td>'+registros[i]['estatus']+'</td>';
			html+='<td>'+registros[i]['fecha_hora']+'</td>';
			html+=`
				<td style="text-align: center;">
					<a href="#" data-toggle="modal" data-target="#modal_productos" onclick="buscar_producto(`+registros[i]['id']+`)" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
					<a href="#" onclick="buscar_galeria(`+registros[i]['id']+`);" data-toggle="tooltip" data-placement="top" title="Galeria" class="btn btn-info"><span class="fa fa-image"></span></a>
					<a href="#" onclick="delete_producto(`+registros[i]['id']+`)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
				</td>
			</tr>
			`;
			cont++;
		}

		html+='</tbody></table>';
		
	    $('#id_tabla').html(html);
	    cargar_data_table();
	});
}

function getAllGaleria(id) {
	$("#capa_loading2").css('display', 'block');
	$.post(base_url_admin+'productos/galeria', {id: id}, function(data) {
		$("#capa_loading2").css('display', 'none');
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
					<div class="col-xs-6 col-md-3">
	                    <a href="#" class="thumbnail">
	                      <img src="`+ base_url3 +`public/administrador/uploads/productos/new_` + registros[i]['image'] + `" alt="...">
	                      <br>
	                      <center>
	                    	<h5>` + registros[i]['orden'] + `</h5>
	                        <button type="button" class="btn btn-danger" onclick="eliminar_imagen(` + registros[i]['id'] + `,` + id + `)">Eliminar</button>
	                      </center>
	                    </a>
	              	</div>`;
			}
		}
		$('#capa_galeria').html(html);
    });
}