function save() {
	datos = new FormData($("#frm_contacto")[0]);
	$.ajax({
		url: base_url_admin+'contacto/update',
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
			}else{
				alertify.set('notifier','position', 'top-center');
	    		alertify.error(datos.mensaje);
			}
		}
	});
}