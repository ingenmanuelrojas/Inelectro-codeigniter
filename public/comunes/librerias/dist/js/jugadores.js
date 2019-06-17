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

function add_jugador() {
	$('#btn_generar_codigo').show(); op = 'guardar';
  	$('#frm_jugadores')[0].reset(); // reset form on modals
  	$('#nuevo_jugador').modal('show'); // show bootstrap modal
    $('.modal-title').text('Agregar Jugador'); // Set Title to Bootstrap modal title
    $("#img_perfil").attr("src","http://via.placeholder.com/80x80");
    $('#errores').css('display','none');
    $('.select2').val('').trigger('change');
}

function generar_codigo() {
	url_modulo = base_url+'jugadores/jugadores/generar_codigo/';
	$.ajax({
        url      : url_modulo,
        type     : "post",
        dataType : "json",
		contentType: false,
        processData: false,
        success: function (data) {
        	var datos = jQuery.parseJSON(JSON.stringify(data));
        	cod_anterior = datos.cod_fedatario;
        	if (cod_anterior == null) {
        		cod_nuevo = 1;
        	}else{
        		cod_nuevo = parseInt(cod_anterior) + parseInt(1);
        	}
    		$('#txt_cod_fedatario').val(cod_nuevo);

        },
        error: function (data) {
        	alert("segundo: "+data);
        }
    });
}

function save_jugadores() {
	var errores = ""; 
	if (campo_obligatorio($('#txt_nombre').val()) == false 
		|| campo_obligatorio($('#txt_cod_fedatario').val()) == false 
		|| campo_obligatorio($('#txt_apellido').val()) == false 
		|| campo_obligatorio($('#txt_fecha_nac').val()) == false 
		|| campo_obligatorio($('#txt_edad').val()) == false 
		|| campo_obligatorio($('#txt_email').val()) == false 
		|| campo_obligatorio($('#txt_dni').val()) == false 
		|| $('#cmb_departamento').val() == "" 
		|| $('#cmb_categoria').val() == "" 
		|| $('#combo_provincias').val() == "" 
		|| $('#combo_distrito').val() == "" 
		|| $('#cmb_nacionalidad').val() == "" 
		|| $('#txt_pts_ranking').val() == 0
		|| campo_obligatorio($('#txt_telefono_celular').val()) == false) { 
		errores += '* Debe llenar todos los campos obligatorios.<br/>'; 
	}if($('#txt_telefono_celular').val() != "" && campo_telefono($('#txt_telefono_celular').val()) == false){ 
		errores += '* Debe ingresar un Teléfono Celular valido<br/>'; 
	}if($('#txt_email').val() != "" && campo_email($('#txt_email').val()) == false){ 
		errores += '* Debe ingresar un Email valido<br/>'; 
	}if($('#txt_dni').val() != "" && campo_dni($('#txt_dni').val()) == false){ 
		errores += '* Debe ingresar un DNI valido de 8 digitos.<br/>'; 
	}if (errores!="") { 
		$('#errores').html(errores); 
		$('#errores').css('display','block'); 
	}else{
		$('#errores').css('display','none');

		var url_modulo = "";
		if (op == "guardar") {
			url_modulo = base_url+'jugadores/jugadores/store/';
		}else{
			url_modulo = base_url+'jugadores/jugadores/update/';
		}
		datos = new FormData($("#frm_jugadores")[0]);
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

				listar_jugadores();
	            $('#nuevo_jugador').modal('hide');
	        },
	        error: function (data) {
	        	console.log(data);
	        	html='<h1>Ocurrio un error</h1>';
	            $('#id_tabla').html(html);
	            $('#nuevo_jugador').modal('hide');
	        }
	    });
	}
}

function buscar_jugador(id) {
	$("#cargando").html("<img style='width: 35px; position: absolute; top: 9px; left: 15%;' src="+base_url+"assets/images/loading.gif>");
	$('#combo_distrito').empty();
	$('#btn_generar_codigo').hide();
	$('#errores').css('display','none');
	op = 'editar';
	$('#frm_jugadores')[0].reset();
	var url_modulo = base_url+'jugadores/jugadores/buscar_jugador/';
	datos = new FormData($("#frm_jugadores")[0]);
    $.ajax({
        url     : url_modulo+id,
        type    : "post",
        dataType : "json",
		data: datos,
		contentType: false,
        processData: false,
        success: function (datos) {
        	if (datos.imagen != "") {
				imagen = base_url+'assets/uploads/jugadores/new_'+datos.imagen;
			}else{
				if (datos.sexo == "M") {
					imagen = base_url+'assets/images/jugador_base_hombre.jpg';
				}else{
					imagen = base_url+'assets/images/jugador_base_mujer.jpg';
				}
			}
            $('#txt_id').val(datos.id);
            $('#txt_cod_fedatario').val(datos.cod_fedatario);
            $('#txt_nombre').val(datos.nombres);
            $('#txt_apellido').val(datos.apellidos);
            $('#txt_fecha_nac').val(datos.fecha_nacimiento);
            $('#txt_edad').val(datos.edad);
            $('#txt_email').val(datos.correo);
            $('#txt_dni').val(datos.dni);
            $('#cmb_nacionalidad').val(datos.nacionalidad).trigger('change.select2');
            $('#txt_pasaporte').val(datos.pasaporte);
            $("#txt_telefono_celular").val(datos.telefono_celular);
            $("#txt_telefono_domicilio").val(datos.telefono_domicilio);
            $("#txt_telefono_familiar").val(datos.telefono_familiar);
            $('#txt_lugar_nacimiento').val(datos.lugar_nacimiento);
            $('#txt_lugar_residencia').val(datos.lugar_residencia);
            $('#cmb_tipo_categoria').val(datos.tipo_categoria).trigger('change.select2');
            $('#cmb_categoria').val(datos.categoria).trigger('change.select2');
            $('#txt_altura').val(datos.altura);
            $('#txt_peso').val(datos.peso);
            $('#cmb_mano').val(datos.mano);
            $('#cmb_sexo').val(datos.sexo);
            $('#txt_afecciones').val(datos.afecciones);
            $('#txt_seguro').val(datos.seguro_medico);
            $('#txt_pts_ranking').val(datos.puntos_ranking);
            $("#img_perfil").attr("src",imagen);
            $('#cmb_departamento').val(datos.id_departamento).trigger('change.select2');
            buscar_provincia(datos.id_departamento);
            buscar_distrito(datos.id_provincia);
            $("#cmb_provincia").append('<option value="'+datos.id_provincia+'">'+datos.nom_provincia+'</option>');
            $("#cmb_distrito").append('<option value="'+datos.id_distrito+'">'+datos.nom_distrito+'</option>');

            $('.modal-title').text('Editar Usuario');
            $("#cargando").html("");
        },
        error: function (datos) {
            alert(resp);
            //window.location.href = base_url + resp;
            //window.location.href = base_url + resp;
        }
    });
}

function listar_jugadores() {
	url_modulo = base_url+'jugadores/jugadores/listar_jugadores/';
	$.ajax({
        url     : url_modulo,
        type    : "post",
        dataType : "json",		
        contentType: false,
        processData: false,
        success: function (datos) {
        	registros = eval(datos);

        	html='<table class="table table-bordered table-hover table-condensed data_table"><thead><tr><th>Imágen</th><th>Cod. Fedatario</th><th>Nombres</th><th>Apellidos</th><th>Edad</th><th>Correo</th><th>Opciones</th></tr></thead><tbody>';
		        	
			for (var i = 0;  i < registros.length;  i++) {
				if (registros[i]['imagen'] != "") {
					imagen = base_url+'assets/uploads/jugadores/new_'+registros[i]['imagen'];
				}else{
					if (registros[i]['sexo'] == "M") {
						imagen = base_url+'assets/images/jugador_base_hombre.jpg';
					}else{
						imagen = base_url+'assets/images/jugador_base_mujer.jpg';
					}
				}
				html+='<tr><td><img style="display: block; margin: auto; width: 35px;" src="'+imagen+'" alt=""></td>';
				html+='<td>FDPT-'+registros[i]['cod_fedatario']+'</td>';
				html+='<td>'+registros[i]['nombres']+'</td>';
				html+='<td>'+registros[i]['apellidos']+'</td>';
				html+='<td>'+registros[i]['edad']+'</td>';
				html+='<td>'+registros[i]['correo']+'</td>';
				html+='<td class="btn-group">';
				html+='<a href="#" data-toggle="modal" data-target="#nuevo_jugador" onclick="buscar_jugador('+registros[i]['id']+');" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>';
				html+='<a href="#" onclick="delete_jugador('+registros[i]['id']+')" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>';
				html+='</td>';
				html+='</tr>';

			}

			html+='</tbody></table>';

			
		    $('#id_tabla').html(html);
		    cargar_data_table();
        }
    });
}

function delete_jugador(id) {
	var url_modulo = base_url+'jugadores/jugadores/delete/'+id;

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

				listar_jugadores();
	        },
	        error: function (resp) {
	        	alert(resp);
	        }
	    });
	}, function(){ 
		alertify.error('Cancelaste la operación.');
	});
}

function buscar_provincia(id_departamento) {
	$("#cmb_provincia").empty();
	if (id_departamento == undefined){
		cod_departamento = $('#cmb_departamento').val();
	}else{
		cod_departamento = id_departamento;
	}
	url_modulo = base_url+'comunes/combo_provincias/';
	$.post(url_modulo, {cod_departamento: cod_departamento}, function(data) {
		var datos = eval(data);	
			$("#cmb_provincia").append('<option value="">Seleccione...</option>');
		$.each(datos, function(index, item) {
	        $("#cmb_provincia").append('<option value="' + item.id + '">' + item.nombre + '</option>');
	      });
	});
}

function buscar_distrito(id_provincia) {
	$("#cmb_distrito").empty();
	if (id_provincia == undefined) {
		cod_provincia = $('#cmb_provincia').val();
	}else{
		cod_provincia = id_provincia;
	}
	url_modulo = base_url+'comunes/combo_distrito/';
	$.post(url_modulo, {cod_provincia: cod_provincia}, function(data) {
		var datos = eval(data);	
	        $("#cmb_distrito").append('<option value="">Seleccione...</option>');
		$.each(datos, function(index, item) {
	        $("#cmb_distrito").append('<option value="' + item.id + '">' + item.nombre + '</option>');
      	});
	});
}	

function calcularEdadJugador() {
	edad = calcularEdad($('#txt_fecha_nac').val());
	$('#txt_edad').val(edad);

	if (edad == 5 || edad == 6) { //TEN 10
		id_tipo_categoria = 21;
		id_categoria = 4;
	}else if (edad == 7 || edad == 8){
		id_tipo_categoria = 21;
		id_categoria = 5;
	}else if (edad == 8 || edad == 9){
		id_tipo_categoria = 21;
		id_categoria = 6;
	}else if (edad == 9 || edad == 10){ // JUNIORS
		id_tipo_categoria = 22;
		id_categoria = 7;
	}else if (edad == 11 || edad == 12){
		id_tipo_categoria = 22;
		id_categoria = 8;
	}else if (edad == 13 || edad == 14){
		id_tipo_categoria = 22;
		id_categoria = 9;
	}else if (edad == 15 || edad == 16){
		id_tipo_categoria = 22;
		id_categoria = 10;
	}else if (edad == 17 || edad == 18){
		id_tipo_categoria = 22;
		id_categoria = 11;
	}else if (edad >= 19 && edad <= 34){ //PROFESIONALES
		id_tipo_categoria = 25;
		id_categoria = 12;
	}else if (edad >= 35 && edad <= 39){ //SENIORS
		id_tipo_categoria = 23;
		id_categoria = 26;
	}else if (edad >= 40 && edad <= 44){
		id_tipo_categoria = 23;
		id_categoria = 27;
	}else if (edad >= 45 && edad <= 49){
		id_tipo_categoria = 23;
		id_categoria = 28;
	}else if (edad >= 50 && edad <= 54){
		id_tipo_categoria = 23;
		id_categoria = 29;
	}else if (edad >= 55 && edad <= 59){
		id_tipo_categoria = 23;
		id_categoria = 30;
	}else if (edad >= 60 && edad <= 64){
		id_tipo_categoria = 23;
		id_categoria = 31;
	}else if (edad >= 65 && edad <= 69){
		id_tipo_categoria = 23;
		id_categoria = 32;
	}else if (edad >= 70 && edad <= 74){
		id_tipo_categoria = 23;
		id_categoria = 33;
	}else if (edad >= 75 && edad <= 79){
		id_tipo_categoria = 23;
		id_categoria = 34;
	}else if (edad >= 80 && edad <= 85){
		id_tipo_categoria = 23;
		id_categoria = 35;
	}

	$('#cmb_tipo_categoria').val(id_tipo_categoria).trigger('change.select2');
	$('#cmb_categoria').val(id_categoria).trigger('change.select2');
}