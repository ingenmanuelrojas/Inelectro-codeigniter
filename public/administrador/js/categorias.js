function nueva_categoria() {
	op = 'guardar';
  	$('#frm_categorias')[0].reset();
  	$('#modal_categorias').modal('show');
    $('.modal-title').text('Nueva Categoría');
    $('#errores').css('display','none');
}

function save_categoria() {
	var url_modulo = "";
	if (op == "guardar") {
		url_modulo = base_url_admin+'categoria/store';
	}else{
		url_modulo = base_url_admin+'categoria/update';
	}
	datos = new FormData($("#frm_categorias")[0]);
	$.ajax({
		url: url_modulo,
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
	    		$('#modal_categorias').modal('hide');
	    		getAll();
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.success(datos.mensaje);
			}
		},
		error: function (data) {

        }
	});
}

function buscar_categoria(id) {
	$('#frm_categorias')[0].reset();
	$.post(base_url_admin+'categoria/search', {
		id: id
	}, function(data) {
		var datos = JSON.parse(data);
		op = 'editar';
		$('#txt_id').val(datos.id);
        $('#txt_nombre').val(datos.nombre);
        $('#txt_descripcion').val(datos.descripcion);

        $('.modal-title').text('Editar Usuario');
	});
}

function delete_categoria(id) {
 	alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
	alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar el registro?', function(){ 
		$.post(base_url_admin+'categoria/delete', {
			id: id
		}, function(data) {
			var datos = jQuery.parseJSON(JSON.stringify(data));

            if (datos.resp == true) {
                alertify.set('notifier','position', 'top-center');
                alertify.success(datos.mensaje);
            }

            if (datos.resp == false) {
                alertify.set('notifier','position', 'top-center');
                alertify.error(datos.mensaje);
            }
			getAll();
		});
	}, function(){ 
		alertify.error('Cancelaste la operación.');
	});
}

function getAll() {
	$.post(base_url_admin+'categoria/getAll', function(data) {
		registros = eval(data);

    	html=`
			<table class="table table-bordered table-hover table-condensed data_table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Descripcion</th>
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
			html+='<td>'+registros[i]['descripcion']+'</td>';
			html+='<td>'+registros[i]['fecha_hora']+'</td>';
			html+=`
				<td style="text-align: center;">
					<a href="#" data-toggle="modal"  data-target="#modal_categorias" onclick="buscar_categoria(`+registros[i]['id']+`)" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
					<a href="#" onclick="delete_categoria(`+registros[i]['id']+`)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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