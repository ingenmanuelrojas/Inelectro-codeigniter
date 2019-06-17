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

function soloNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function soloLetrasNumeros(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
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