function validarFechaMayorActual(date){
    var hoy = new Date();
	var dia = hoy.getDate();
	var mes = hoy.getMonth()+1;
	var anio= hoy.getFullYear();
	var fecha = String(anio+"-"+mes+"-"+dia);
 	if (date > fecha_actual){
    	return true;
 	}
    else{
        return false;
    }
}

function validarFechas(){
	if(!validarFechaMayorActual(document.solicitar.llegada.value).val()){
		alert('La fecha de llegada debe ser mayor a la fecha actual.');
		return false;
	}
	if (document.solicitar.llegada.value > document.solicitar.salida.value) {
		alert("La fecha de salida es anterior a la de llegada.");
        document.solicitar.salida.focus();
        return (false);
	}
	return true;
}

function validarSolicitud(e){ 
	solicitud=confirm("¿Está seguro que desea solicitar este Couch?");
	if (solicitud){
	// si pulsamos en aceptar
		solicitud2=confirm("No.. Pero está completamente seguro que desea solicitarlo!!??");
		if (solicitud2){
			solicitud3=confirm("Mmm.. no se vaya a arrepentir..");
			if (solicitud3){
				alert("Ok.. como desee.");
				//if (validarFechas()){
    				document.solicitar.submit();
    			//}
			}
		}
	}
	else{ 
	// si pulsamos en cancelar
		return (false); 
	}  
}

