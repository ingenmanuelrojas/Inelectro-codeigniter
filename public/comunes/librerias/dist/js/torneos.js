  $(document).ready(function() {
    $.post(base_url+'/torneos/torneos/listarCalendario',function(data){
      $('#calendar').fullCalendar({  
        themeSystem:'bootstrap4',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        defaultDate: new Date(),
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: true,
        select: function(start, end) {
          $('#frm_torneos')[0].reset();
          $("#btn_update").hide();
          $("#btn_save").show();
          $('.modal-title').text('Crear Nuevo Torneo');
          $("#txt_fecha_ini").val(start.format());
          $("#txt_fecha_fin").val(end.format());
          $('#modal_torneo').modal();
          $('#errores').css('display','none');
          $('#cmb_categoria option').remove();
        },
        eventDrop:function(event, delta, revertFunc){
          var id        = event.id;
          var fecha_ini = event.start.format();
          var fecha_fin = event.end.format();

          $.post(base_url+'/torneos/torneos/update', 
            {
              id        : id,
              fecha_ini : fecha_ini,
              fecha_fin : fecha_fin
            }, 
            function(data) {
             var datos = $.parseJSON(data);
              if (datos.resp == true) {
                  alertify.set('notifier','position', 'top-center');
                  alertify.success(datos.mensaje);
              }

              if (datos.resp == false) {
                  alertify.set('notifier','position', 'top-center');
                  alertify.error(datos.mensaje);
              }
          });
        },
        eventResize: function(event, delta, revertFunc) {
          var id        = event.id;
          var fecha_ini = event.start.format();
          var fecha_fin = event.end.format();

          $.post(base_url+'/torneos/torneos/update', 
            {
              id        : id,
              fecha_ini : fecha_ini,
              fecha_fin : fecha_fin
            }, 
            function(data) {
             var datos = $.parseJSON(data);
              if (datos.resp == true) {
                  alertify.set('notifier','position', 'top-center');
                  alertify.success(datos.mensaje);
              }

              if (datos.resp == false) {
                  alertify.set('notifier','position', 'top-center');
                  alertify.error(datos.mensaje);
              }
          });
        },
        eventRender: function(event, element) {
          element.bind('dblclick', function() {
            $('#cmb_categoria option').remove();
            $('#errores').css('display','none');
            $('#txt_nombre').val(event.title);
            $("#txt_color").val(event.color);
            $("#txt_sede").val(event.sede);
            $("#txt_fecha_inscripcion").val(event.fecha_inscripcion);
            $("#txt_fecha_retiro").val(event.fecha_retiro);
            $("#cmb_grado").val(event.grado);
            $("#cmb_tipo_categoria").val(event.tipo_categoria);
            get_categorias(event.tipo_categoria, JSON.parse(event.categoria));
            
            $("#btn_save").hide();
            $("#btn_update").show();
            
            $("#txt_color_letra").val(event.textColor);
            $('#modal_torneo').modal();
            $('.modal-title').text('Editar Torneo');
            op = 'editar';
            $('#txt_id').val(event.id);
          });
          var el = element.html();
          element.html("<div style='width:90%; float:left;'>" + el + "</div><div class='cerrar' style='text-align:right'><i class='fa fa-close'></i></div>")
          element.find('.cerrar').click(function(e) {
            alertify.dialog('confirm').set({transition:'flipx',message: 'Transition effect: flipx'}).show(); 
              alertify.confirm('Mensaje de Confirmación', '¿Estas seguro que deseas eliminar el registro?', function(){ 
                $.post(base_url+'/torneos/torneos/delete/', 
                  {
                    id : event.id,
                  }, 
                  function(data) {
                   var datos = $.parseJSON(data);
                    if (datos.resp == true) {
                        alertify.set('notifier','position', 'top-center');
                        alertify.success(datos.mensaje);
                        $('#calendar').fullCalendar('removeEvents', event.id);
                    }

                    if (datos.resp == false) {
                        alertify.set('notifier','position', 'top-center');
                        alertify.error(datos.mensaje);
                    }
                });
            }, function(){ 
              alertify.error('Cancelaste la operación.');
            });
          });
        },
        eventSources:[{
          events: $.parseJSON(data),
          color:"#286090",
          textColor:"#ffffff"
        }]
      });
    });
  });

  function save_torneos() {
    var errores = ""; 
    if (campo_obligatorio($('#txt_nombre').val()) == false 
      || $('#cmb_grado').val() == "" 
      || $('#cmb_categoria').val() == ""
      || campo_obligatorio($('#txt_fecha_inscripcion').val()) == false
      || campo_obligatorio($('#txt_fecha_retiro').val()) == false
      || campo_obligatorio($('#txt_sede').val()) == false) {
      errores += '* Debe llenar todos los campos obligatorios.<br/>';
      $('#errores').html(errores); 
      $('#errores').css('display','block'); 
    }else{
      $('#errores').css('display','none');
      var url_modulo = base_url+'/torneos/torneos/store/';
      
        $.post(url_modulo, {
          nombre            : $('#txt_nombre').val(),
          fecha_ini         : $('#txt_fecha_ini').val(),
          fecha_fin         : $('#txt_fecha_fin').val(),
          color             : $('#txt_color').val(),
          grado             : $('#cmb_grado').val(),
          tipo_categoria    : $('#cmb_tipo_categoria').val(),
          categoria         : $('#cmb_categoria').val(),
          sede              : $('#txt_sede').val(),
          fecha_inscripcion : $('#txt_fecha_inscripcion').val(),
          fecha_retiro      : $('#txt_fecha_retiro').val(),
          color_letra       : $('#txt_color_letra').val()
        }, function(data) {
          var datos = $.parseJSON(data);
          if (datos.resp == true) {
            alertify.set('notifier','position', 'top-center');
            alertify.success(datos.mensaje);
            $("#calendar").fullCalendar('removeEvents'); 
            $("#calendar").fullCalendar('addEventSource', datos.listado); 
          }

          if (datos.resp == false) {
            alertify.set('notifier','position', 'top-center');
            alertify.error(datos.mensaje);
          }

          $('#modal_torneo').modal('hide');
     
        });
      }
  }

  function update_torneos() {
    var errores = ""; 
    if (campo_obligatorio($('#txt_nombre').val()) == false 
      || $('#cmb_grado').val() == "" 
      || $('#cmb_categoria').val() == ""
      || campo_obligatorio($('#txt_fecha_inscripcion').val()) == false
      || campo_obligatorio($('#txt_fecha_retiro').val()) == false
      || campo_obligatorio($('#txt_sede').val()) == false) {
      errores += '* Debe llenar todos los campos obligatorios.<br/>';
      $('#errores').html(errores); 
      $('#errores').css('display','block'); 
    }else{
      $('#errores').css('display','none');
      var url_modulo = base_url+'/torneos/torneos/update_data/';
      
      $.post(url_modulo, {
        id                : $('#txt_id').val(), 
        nombre            : $('#txt_nombre').val(),
        color             : $('#txt_color').val(),
        grado             : $('#cmb_grado').val(),
        tipo_categoria    : $('#cmb_tipo_categoria').val(),
        categoria         : $('#cmb_categoria').val(),
        sede              : $('#txt_sede').val(),
        fecha_inscripcion : $('#txt_fecha_inscripcion').val(),
        fecha_retiro      : $('#txt_fecha_retiro').val(),
        color_letra       : $('#txt_color_letra').val()
      }, function(data) {
        var datos = $.parseJSON(data);
        if (datos.resp == true) {
          alertify.set('notifier','position', 'top-center');
          alertify.success(datos.mensaje);
          $("#calendar").fullCalendar('removeEvents'); 
          $("#calendar").fullCalendar('addEventSource', datos.listado); 
        }

        if (datos.resp == false) {
          alertify.set('notifier','position', 'top-center');
          alertify.error(datos.mensaje);
        }

        $('#modal_torneo').modal('hide');
  
      });
    }
  }

  function get_categorias(id_tipo,id_categorias) {
    $('#cmb_categoria option').remove();
    if (id_tipo) {
      tipo = id_tipo;
    }else{
      tipo = $("#cmb_tipo_categoria").val();
    }

    url_modulo = base_url+'torneos/torneos/combo_categorias/';
    $.post(url_modulo, {tipo: tipo}, function(data) {
      var datos = eval(data); 
      $.each(datos, function(index, item) {
        $("#cmb_categoria").append('<option value="' + item.id + '">' + item.descripcion + '</option>');
      });
      if (id_categorias) {
        $("#cmb_categoria").val(id_categorias);
      }
    });
  }

  function listado_inscritos_categoria(id_categoria,id_torneo) {
    $.post(base_url+'torneos/torneos/listado_inscritos_categoria/', {id_categoria: id_categoria, id_torneo:id_torneo}, function(data) {
      registros = eval(data);

      html='<table class="table table-bordered table-hover table-condensed data_table"><thead><tr><th>Imágen</th></tr></thead><tbody>';
              
      for (var i = 0;  i < registros.length;  i++) {
        html+='<td>'+registros[i]['nombre_completo']+'</td>';
        html+='</tr>';

      }

      html+='</tbody></table>';

      
        $('#tabla_inscritos').html(html);
        //cargar_data_table();
    });
  }

