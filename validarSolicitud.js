function validarFechaMayorActual(date){
    var hoy = new Date();
	var dia = hoy.getDate();
	var mes = hoy.getMonth()+1;
	var anio= hoy.getFullYear();
	var fecha = String(anio+"-"+mes+"-"+dia);
	alert(date);
 	if (date > fecha){
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

function validarFecha() {
    var fechaDesde = document.getElementById("llegada").value;
    var fechaHasta = document.getElementById("salida").value;
	var fechaActual= new Date();
	var mes= fechaActual.getMonth()+1;
    if(mes<10){mes="0"+mes;};
    var dia= fechaActual.getDate();
    if(dia<10){dia="0"+dia;};
    var hoy=fechaActual.getFullYear()+"-"+mes+"-"+dia;
	
    
		if((fechaDesde == "")&(fechaHasta == "")) { alert("Ingrese fecha de llegada y de salida por favor."); return false; }
		else if((fechaDesde != "")&(fechaHasta == "")) {alert("La fecha de salida no esta seleccionada!!"); return false;}
		else if((fechaDesde == "")&(fechaHasta != "")) {alert("La fecha de llegada no esta seleccionada!!"); return false;}
        else if(fechaDesde<hoy){alert("La fecha de llegada es menor a la fecha actual!!"); return false;}
		else if(fechaHasta<fechaDesde){alert("La fecha de salida es menor a la fecha de llegada!!"); return false;}
		else{return true;}
		}

function validarSolicitud(e){ 
	solicitud=confirm("¿Está seguro que desea solicitar este Couch?");
	if (solicitud){
	// si pulsamos en aceptar
		if (validarFecha()){
    		document.solicitar.submit();
    	}
	}
	else{ 
	// si pulsamos en cancelar
		return (false); 
	}  
}

