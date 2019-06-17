function init() {
    var file_img = document.getElementById('txt_file_img');
    file_img.addEventListener('change', mostrarImagen, false);
}

function mostrarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
      var img = document.getElementById('img_perfil');
      img.src= event.target.result;
    }
    reader.readAsDataURL(file);
}
window.addEventListener('load', init, false); 

/*----------------FUNCIONES----------------*/

function add_usuarios() {
	op = 'guardar';
  	$('#form_usuarios')[0].reset(); // reset form on modals
  	$('#nuevo_usuario').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Usuario'); // Set Title to Bootstrap modal title
    $("#img_perfil").attr("src","http://via.placeholder.com/80x80");
    $('#errores').css('display','none');
}

function save_usuarios() {
	var errores = "";
	if (campo_obligatorio($('#txt_nombre').val()) == false || campo_obligatorio($('#txt_apellido').val()) == false || campo_obligatorio($('#txt_telefono').val()) == false || campo_obligatorio($('#txt_email').val()) == false || campo_obligatorio($('#txt_usuario').val()) == false || campo_obligatorio($('#txt_clave').val()) == false) {
		errores += '* Debe llenar todos los campos obligatorios.<br/>';
	}if($('#txt_telefono').val() != "" && campo_telefono($('#txt_telefono').val()) == false){
		errores += '* Debe ingresar un Teléfono valido<br/>';
	}if($('#txt_email').val() != "" && campo_email($('#txt_email').val()) == false){
		errores += '* Debe ingresar un Email valido<br/>';
	}if (errores!="") {
		$('#errores').html(errores);
		$('#errores').css('display','block');
	}else{
		$('#errores').css('display','none');

		var url_modulo = "";
		if (op == "guardar") {
			url_modulo = base_url+'configuracion/usuarios/store/';
		}else{
			url_modulo = base_url+'configuracion/usuarios/update/';
		}
		datos = new FormData($("#form_usuarios")[0]);
	    $.ajax({
	        url      : url_modulo,
	        type     : "post",
	        dataType : "json",
			data: datos,
			contentType: false,
	        processData: false,
	        success: function (data) {
	        	var datos = jQuery.parseJSON(JSON.stringify(data));

	        	if (datos.resp == true) {
	        		alertify.set('notifier','position', 'top-center');
	        		alertify.success(datos.mensaje);
	        	}

	        	if (datos.resp == false) {
	        		alertify.set('notifier','position', 'top-center');
	        		alertify.error(datos.mensaje);
	        	}

				listar_usuarios();
	            $('#nuevo_usuario').modal('hide');
	        },
	        error: function (data) {
	        	console.log(data);
	        	html='<h1>Error</h1>';
	            $('#id_tabla').html(html);
	        }
	    });
	}
}

function delete_usuario(id) {
	var url_modulo = base_url+'configuracion/usuarios/delete/'+id;

 	alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
	alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar el registro?', function(){ 
		$.ajax({
	        url      : url_modulo,
	        type     : "post",
	        dataType : "json",
			data: {
				id : id
			},
	        success: function (data) {
	        	var datos = jQuery.parseJSON(JSON.stringify(data));

                if (datos.resp == true) {
                    alertify.set('notifier','position', 'top-center');
                    alertify.success(datos.mensaje);
                }

                if (datos.resp == false) {
                    alertify.set('notifier','position', 'top-center');
                    alertify.error(datos.mensaje);
                }

				listar_usuarios();
	        },
	        error: function (resp) {
	        	alert(resp);
	        }
	    });
	}, function(){ 
		alertify.error('Cancelaste la operación.');
	});
}

function buscar_usuario(id) {
	$('#errores').css('display','none');
	op = 'editar';
	$('#form_usuarios')[0].reset();
	var url_modulo = base_url+'configuracion/usuarios/edit/';
	datos = new FormData($("#form_usuarios")[0]);
    $.ajax({
        url     : url_modulo+id,
        type    : "post",
        dataType : "json",
		data: datos,
		contentType: false,
        processData: false,
        success: function (datos) {
        	if (datos.imagen == "") {
        		imagen = base_url+"assets/images/usuario_base.png";
        	}else{
        		imagen = base_url+"assets/uploads/usuarios/new_"+datos.imagen;
        	}
            $('#txt_id').val(datos.id);
            $('#txt_nombre').val(datos.nombres);
            $('#txt_apellido').val(datos.apellidos);  
            $('#txt_telefono').val(datos.telefono);  
            $('#txt_email').val(datos.email);  
            $('#txt_usuario').val(datos.username);  
            $('#txt_clave').val(datos.password);  
            $("#img_perfil").attr("src",imagen);
            $('#cmb_rol').val(datos.rol);  

            $('.modal-title').text('Editar Usuario');
        },
        error: function (datos) {
            alert(resp);
            //window.location.href = base_url + resp;
            //window.location.href = base_url + resp;
        }
    });
}

function listar_usuarios() {
	url_modulo = base_url+'configuracion/usuarios/listar_usuarios/';
	$.ajax({
        url     : url_modulo,
        type    : "post",
        dataType : "json",
		//data: datos,
		contentType: false,
        processData: false,
        success: function (datos) {
        	registros = eval(datos);

        	html='<table class="table table-bordered table-hover table-condensed data_table"><thead><tr><th>#</th><th>Nombres</th><th>Apellidos</th><th>telefono</th><th>email</th><th>username</th><th>Permiso</th><th>Opciones</th></tr></thead><tbody>';
		        	
			for (var i = 0;  i < registros.length;  i++) {
				if (registros[i]['imagen'] != "") {
					imagen = base_url+'assets/uploads/usuarios/new_'+registros[i]['imagen'];
				}else{
					imagen = base_url+'assets/images/usuario_base.png';
				}
				html+='<tr><td><img style="display: block; margin: auto; width: 35px;" src="'+imagen+'" alt=""></td>';
				html+='<td>'+registros[i]['nombres']+'</td>';
				html+='<td>'+registros[i]['apellidos']+'</td>';
				html+='<td>'+registros[i]['telefono']+'</td>';
				html+='<td>'+registros[i]['email']+'</td>';
				html+='<td>'+registros[i]['username']+'</td>';
				html+='<td>'+registros[i]['rol']+'</td>';
				html+='<td style="text-align: center;">';
				html+='<a href="#" data-toggle="modal" data-target="#nuevo_usuario" onclick="buscar_usuario('+registros[i]['id']+');" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>';
				html+='<a href="#" onclick="delete_usuario('+registros[i]['id']+')" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>';
				html+='</td>';
				html+='</tr>';

			}

			html+='</tbody></table>';

			
		    $('#id_tabla').html(html);
		    cargar_data_table();
        }
    });
}

