/*----------------FUNCIONES----------------*/
function add_permisos() {
	op = 'guardar';
  	$('#frm_permisos')[0].reset(); // reset form on modals
  	$('#modal_permisos').modal('show'); // show bootstrap modal
    $('.modal-title').text('Nuevo Permiso'); // Set Title to Bootstrap modal title
    $("#cmb_rol").removeAttr('disabled');
    $("#cmb_menu").removeAttr('disabled');
}

function save_permisos() {
    var url_modulo = "";
    if (op == "guardar") {
        url_modulo = base_url+'configuracion/permisos/store/';
    }else{
        url_modulo = base_url+'configuracion/permisos/update/';
    }
    datos = new FormData($("#frm_permisos")[0]);
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

            listar_permisos();
            $('#modal_permisos').modal('hide');
        },
        error: function (data) {
            console.log(data);
            html='<h3>Error, tome un print de pantalla y comuniquese con el administrador del sistema.</h3>';
            $('#id_tabla').html(html);
            $('#modal_permisos').modal('hide');
        }
    });
}

function buscar_permiso(id) {
    op = 'editar';
	$('#frm_permisos')[0].reset();
	var url_modulo = base_url+'configuracion/permisos/edit/';
	datos = new FormData($("#frm_permisos")[0]);
    $.ajax({
        url     : url_modulo+id,
        type    : "post",
        dataType : "json",
		data: datos,
		contentType: false,
        processData: false,
        success: function (datos) {

            $('#txt_id').val(datos.id);
            $('#cmb_rol').val(datos.rol_id);
            $("#cmb_rol").attr('disabled','disabled');
            $('#cmb_menu').val(datos.menu_id);
            $("#cmb_menu").attr('disabled','disabled');

            if (datos.read == 1) {
                $("input[name=rd_leer][value='1']").prop("checked",true);
            }else{
                $("input[name=rd_leer][value='0']").prop("checked",true);
            }

            if (datos.insert == 1) {
                $("input[name=rd_agregar][value='1']").prop("checked",true);
            }else{
                $("input[name=rd_agregar][value='0']").prop("checked",true);
            }

            if (datos.update == 1) {
                $("input[name=rd_editar][value='1']").prop("checked",true);
            }else{
                $("input[name=rd_editar][value='0']").prop("checked",true);
            }

            if (datos.delete == 1) {
                $("input[name=rd_eliminar][value='1']").prop("checked",true);
            }else{
                $("input[name=rd_eliminar][value='0']").prop("checked",true);
            }

            $('.modal-title').text('Editar Usuario');
        },
        error: function (datos) {
            alert(datos);
            //window.location.href = base_url + resp;
            //window.location.href = base_url + resp;
        }
    });
}

function listar_permisos() {
    url_modulo = base_url+'configuracion/permisos/listado_permisos/';
    $.ajax({
        url     : url_modulo,
        type    : "post",
        dataType : "json",
        contentType: false,
        processData: false,
        success: function (datos) {
            registros = eval(datos);

            html='<table class="table table-bordered table-hover table-condensed data_table"><thead><tr><th>#</th><th>Rol</th><th>Menu</th><th>Leer</th><th>Insertar</th><th>Actualizar</th><th>Eliminar</th><th>Opciones</th> </tr></thead><tbody>';
                    
            for (var i = 0;  i < registros.length;  i++) {
                if (registros[i]['read'] == 0) {
                    read = '<span class="fa fa-times"></span>';
                }else{
                    read = '<span class="fa fa-check"></span>';
                }

                if (registros[i]['insert'] == 0) {
                    insert = '<span class="fa fa-times"></span>';
                }else{
                    insert = '<span class="fa fa-check"></span>';
                }

                if (registros[i]['update'] == 0) {
                    update = '<span class="fa fa-times"></span>';
                }else{
                    update = '<span class="fa fa-check"></span>';
                }

                if (registros[i]['delete'] == 0) {
                    eliminar = '<span class="fa fa-times"></span>';
                }else{
                    eliminar = '<span class="fa fa-check"></span>';
                }

                html+='<td class="text-center">'+registros[i]['id']+'</td>';
                html+='<td>'+registros[i]['rol']+'</td>';
                html+='<td>'+registros[i]['menu']+'</td>';
                html+='<td class="text-center">'+read+'</td>';
                html+='<td class="text-center">'+insert+'</td>';
                html+='<td class="text-center">'+update+'</td>';
                html+='<td class="text-center">'+eliminar+'</td>';


                html+='<td style="text-align: center;">';
                html+='<a href="#" data-toggle="modal" data-target="#modal_permisos" onclick="buscar_permiso('+registros[i]['id']+');" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>';
                html+='<a href="#" onclick="delete_permiso('+registros[i]['id']+')" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>';
                html+='</td>';
                html+='</tr>';

            }

            html+='</tbody></table>';

            
            $('#id_tabla').html(html);
            cargar_data_table();
        }
    });
}

function delete_permiso(id) {
    var url_modulo = base_url+'configuracion/permisos/delete/'+id;

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

                listar_permisos();
            },
            error: function (resp) {
                alert(resp);
            }
        });
    }, function(){ 
        alertify.error('Cancelaste la operación.');
    });
}
