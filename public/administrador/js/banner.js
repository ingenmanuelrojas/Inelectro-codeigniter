function buscar_banner(id) {
	$("#txt_id").val(id);
	$.post(base_url_admin+'banner/get_banner', {
		id: id
	}, function(data) {
		datos = $.parseJSON(data);
		$("#txt_modulo").val(datos.modulo);
		$("#txt_lugar").val(datos.lugar);
		$("#txt_link").val(datos.link);
		$("#txt_width").val(datos.width);
		$("#txt_height").val(datos.height);
		$("#txt_medidas").html(datos.medidas);
		$("#capa_img").html(`
			<a href="javascript:void" class="thumbnail">
				<img src="`+ base_url3 +`public/administrador/uploads/banners/new_`+ datos.image +`" alt="...">    
            </a>
        `);
	});
}

function save_banner() {
	$("#capa_loading").css('display', 'block');
	datos = new FormData($("#frm_banner")[0]);
	$.ajax({
		url: base_url_admin+'banner/save_banner',
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
	    		//getAllGaleria($("#txt_id_prod").val());
	    		//$('#frm_galeria')[0].reset();
	    		buscar_banner($("#txt_id").val())
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.error(datos.mensaje);
	    		$("#capa_loading").css('display', 'none');
			}
		}
	});
}