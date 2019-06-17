function save() {
	//$("#capa_loading").css('display', 'block');
	datos = new FormData($("#frm_nosotros")[0]);
	$.ajax({
		url: base_url_admin+'nosotros/update',
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
	    		
	    		//$("#capa_loading").css('display', 'none');
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.error(datos.mensaje);
	    		//$("#capa_loading").css('display', 'none');
			}
		}
	});
}