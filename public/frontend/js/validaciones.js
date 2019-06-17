function campo_obligatorio(campo) {
	valor = campo;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
	  return false;
	}
}

function campo_numerico(campo){
	valor = campo;
	if(isNaN(valor) ) {
	  return false;
	}
}

function campo_email(campo){
	if(!(/\S+@\S+\.\S+/.test(campo))){
		return false;
	}
}

function campo_telefono(campo){
	valor = campo;
	if( !(/^\d{9}$/.test(valor)) ) {
	  return false;
	}
}

function campo_dni(campo){
	valor = campo;
	if( !(/^\d{8}$/.test(valor)) ) {
	  return false;
	}
}

function campo_fecha(campo){
	var ano = document.getElementById("ano").value;
	var mes = document.getElementById("mes").value;
	var dia = document.getElementById("dia").value;
	 
	valor = new Date(ano, mes, dia);
	 
	if( !isNaN(valor) ) {
	  return false;
	}
}

function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function caracteres_especiales(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9@.-]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    return edad;
}

function completar_ceros(tam, num) {
	if (num.toString().length <= tam) return completar_ceros(tam, "0" + num)
	else return num;
}

function get_observacion(edad,cat_torneo) {
	if (cat_torneo == "TENIS 10") {
		if (edad == 5 || edad == 6) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>ROJA A, ROJA B</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else if (edad == 7 || edad == 8) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>ROJA B, NARANJA</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		
		}else if (edad == 8 || edad == 9) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>NARANJA, VERDE</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		
		}else if (edad == 9 || edad == 10) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>VERDE</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		
		}else{
			observacion = '<b>Atención:</b> No cumples los requisitos de edad para participar en este torneo.';
			$('#btn_inscribir').attr("disabled", true);
		}
	}else if (cat_torneo == "JUNIORS") {
		if (edad == 9 || edad == 10) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>JUNIORS 12</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else if (edad == 11 || edad == 12) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>JUNIORS 12, JUNIORS 14, JUNIORS 16</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else if (edad == 13 || edad == 14) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>JUNIORS 14, JUNIORS 16, JUNIORS 18</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else if (edad == 15 || edad == 16) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>JUNIORS 16, JUNIORS 18</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else if (edad == 17 || edad == 18) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>JUNIORS 18</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}else{
			observacion = '<b>Atención:</b> No cumples los requisitos de edad para participar en este torneo.';
			$('#btn_inscribir').attr("disabled", true);
		}
	}else if(cat_torneo == "PRIMERA CATEGORIA"){
		if (edad < 14 || edad > 34) {
			observacion = '<b>Observación:</b> No cumples los requisitos de edad para inscribirte a este torneo.</i>';
			$('#btn_inscribir').attr("disabled", true);
		}else{
			observacion = '<b>Observación:</b> Cumples con la edad para inscribirte a este torneo.</i>';
			$('#btn_inscribir').attr("disabled", false);
		}
	}else if(cat_torneo == "SENIORS"){
		if (edad >= 35 && edad <= 39) {
			observacion = '<b>Observación:</b> puedes inscribirte a la categoria <b>SENIORS 35</b>. ';
			$('#btn_inscribir').attr("disabled", true);
		}else if(edad >= 40 && edad <= 44){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40</b>. <i>Debes hacerlo por separado.</i>';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 45 && edad <= 49){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 50 && edad <= 54){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 55 && edad <= 59){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 60 && edad <= 64){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55, SENIOR 60</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 65 && edad <= 69){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55, SENIOR 60, SENIOR 65</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 70 && edad <= 74){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55, SENIOR 60, SENIOR 65, SENIOR 70</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 75 && edad <= 79){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55, SENIOR 60, SENIOR 65, SENIOR 70, SENIOR 75</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else if(edad >= 80 && edad <= 85){
			observacion = '<b>Observación:</b> puedes inscribirte a las categoria <b>SENIORS 35, SENIOR 40, SENIOR 45, SENIOR 50, SENIOR 55, SENIOR 60, SENIOR 65, SENIOR 70, SENIOR 75, SENIOR 80</b>. <i>Debes hacerlo por separado.</i> ';
			$('#btn_inscribir').attr("disabled", false);
		} else{
			observacion = '<b>Atención:</b> No cumples los requisitos de edad para participar en este torneo.';
			$('#btn_inscribir').attr("disabled", true);
		}
	} else{
		observacion = '<b>Atención:</b> No cumples los requisitos de edad para participar en este torneo.';
	}
	return observacion;
}