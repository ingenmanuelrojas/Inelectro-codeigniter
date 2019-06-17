$(document).ready(function() {
    base_url2 = "http://play-digitalmedia.com/proyecto_tenis/";

    $(".btn-remove").on('click', function(e) {
        e.preventDefault();//evitar que se ejecute el href
        var ruta = $(this).attr('href');
        alertify.confirm("¿Estas seguro que deseas Eliminar el registro?", function(e){
            if (e) {
                $.ajax({
                    url     : ruta,
                    type    : "post",
                    success : function(resp){
                        window.location.href = base_url + resp;
                    }
                });
            }
        });
    });

    $(".btn-vista-previa").on('click', function(e) {
        e.preventDefault();//evitar que se ejecute el href
        if ($('#txt_video').val() =="") {
            alertify.error("Debe llenar el campo Video.");
        }else{
            var ruta = $(this).attr('href');
            if (e) {
                $.ajax({
                    url     : ruta,
                    type    : "post",
                    dataType: 'json',
                    data: {
                        video : $('#txt_video').val()
                    },
                    success: function (resp) {
                        $('#vista_previa').html(resp);
                    },
                    error: function (resp) {
                        alert(resp);
                    }
                });
            }
        }
    });

    $(".btn-add").on('click', function(e) {
        e.preventDefault();//evitar que se ejecute el href
        if ($('#txt_video').val() =="") {
            alertify.error("Debe llenar el campo Video.");
        }else{
            var ruta = $(this).attr('href');
            if (e) {
                $.ajax({
                    url     : ruta,
                    type    : "post",
                    //dataType: 'json', CUANDO SE RECIBAN DATOS EN JSON
                    data: {
                        video : $('#txt_video').val(),
                        sede  : $('#txt_id').val()
                    },
                    success: function (resp) {
                        //alertify.alert(resp);
                        window.location.href = base_url + resp;
                    },
                    error: function (resp) {
                        //alertify.error(resp);
                        window.location.href = base_url + resp;
                    }
                });
            }
        }
    });


    $('.sidebar-menu').tree();

    //Desaparecer mensaje de alertas (success, error)
    setTimeout(function() {
        $(".msj").fadeOut(1500);
    },3000);

});


function cargar_data_table(){
    tabla = $('.data_table').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Ãšltimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }, buttons: [
            {
                extend: 'excelHtml5',
                text  : '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr : 'Excel'
            },{
                extend: 'pdfHtml5',
                text  : '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr : 'PDF'
            }

            //'excel', 'pdf', 'print'
        ]
    });
}

function recargar_data_table() {
    tabla.ajax.reload();
}

function hora_sistema() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("btn-hora2").innerHTML = hr + " : " + min + " : " + sec + " " + ap;
    setTimeout('hora_sistema()',1000);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function seleccionarTipo(){
    var combo = $('#cmb_tipo').val();

    if (combo == 0) {
        $('#capa_img').css('display', 'none');
        $('#capa_video').css('display', 'none');
        $('#capa_360').css('display', 'none');
        $('#capa_boton').css('display', 'none');
        $('#capa_boton2').css('display', 'none');
        $('#video-como-comprar').css('display', 'none');
        $('#txt_video').val("");
    }if (combo == 1) {
        $('#capa_img').fadeIn().css('display', 'block');
        $('#capa_boton').fadeIn().css('display', 'block');
        $('#capa_video').css('display', 'none');
        $('#capa_360').css('display', 'none');
        $('#capa_boton2').css('display', 'none');
        $('#video-como-comprar').css('display', 'none');
        $('#txt_video').val("");
    }else if (combo == 2) {
        $('#capa_video').fadeIn().css('display', 'block');
        $('#capa_boton').fadeIn().css('display', 'block');
        $('#capa_boton2').fadeIn().css('display', 'block');
        $('#capa_img').css('display', 'none');
        $('#capa_360').css('display', 'none');
    }else if (combo == 3) {
        $('#capa_360').fadeIn().css('display', 'block');
        $('#capa_boton').fadeIn().css('display', 'block');
        $('#capa_img').css('display', 'none');
        $('#capa_video').css('display', 'none');
        $('#capa_boton2').css('display', 'none');
        $('#video-como-comprar').css('display', 'none');
        $('#txt_video').val("");
    }
}

function etiquetas() {
    var url_modulo = base_url+'seo/home/select_data/';
    $('.cargando').fadeIn().html('<div><img src="'+base_url+'assets/images/loading.gif" alt="" style="margin: auto; display: block; width: 200px;"></div>');
    $.ajax({
        url     : url_modulo,
        type    : "post",
        dataType : "JSON",
        data: {
            combo : $('#cmb_pagina').val()
        },
        success: function (data) {
            $('#txt_key').val(data.keyworks);        
            $('#txt_description').val(data.description);  
            $('.cargando').fadeOut();      
        },
        error: function (data) {
            alert("error");
            //window.location.href = base_url + resp;
        }
    });
}

function hora_sistema() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("btn-hora").innerHTML = hr + " : " + min + " : " + sec + " " + ap;
    setTimeout('hora_sistema()',1000);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

cargar_data_table();