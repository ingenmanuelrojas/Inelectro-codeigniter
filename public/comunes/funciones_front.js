function buscar_costo_afiliacion(ref_categoria) {
	$.post(base_url33+"frontend/comunes/get_monto_afiliacion", {ref_categoria: ref_categoria, moneda : $('#cmb_tipo_pago').val()}, function(data) {
		if ($('#cmb_tipo_pago').val() == 'PEN') {
			$('#txt_costo_afiliacion').val("S/. "+data);
		}else{
			$('#txt_costo_afiliacion').val("$"+data);
		}
	});
}


function buscar_costo_afiliacion_personal() {
	if ($('#cmb_tipo_categoria').val() == "Car type") {
		alertify.error("Debe llenar seleccionar primero una categoria para el jugador.");
	}else{
		$.post(base_url33+"frontend/comunes/get_monto_afiliacion", {ref_categoria: $('#cmb_tipo_categoria').val(), moneda : $('#cmb_tipo_pago').val()}, function(data) {
			if ($('#cmb_tipo_pago').val() == 'PEN') {
				$('#txt_costo_afiliacion').val("S/. "+data);
			}else{
				$('#txt_costo_afiliacion').val("$"+data);
			}
		});
	}
}

function costo_curso(id_curso) {
	$.post(base_url33+"frontend/comunes/get_costo_curso", {id_curso: id_curso, moneda : $('#cmb_tipo_pago').val()}, function(data) {
		if ($('#cmb_tipo_pago').val() == 'PEN') {
			$('#txt_costo_afiliacion').val("S/. "+data);
		}else{
			$('#txt_costo_afiliacion').val("$"+data);
		}
	});
}

