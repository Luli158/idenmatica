function validarRecu() {

	if (!validarCorreo(document.ingresar.email.value)) {
		document.ingresar.email.focus();	
		return false;
	}
	
	document.ingresar.submit();
}

function validarCorreo(email) {
	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if(regex.test(email.trim())) {
		return true;
	}
	else {
		alert('La direccion de correo no es valida');
		return false;
	}
}