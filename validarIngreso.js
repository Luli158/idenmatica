
function validarIngreso() {

	if (!validarCorreo(document.ingresar.email.value)) {
		document.ingresar.email.focus();	
		return false;
	}
	
	if (document.ingresar.clave.value.length < 4) {
		alert("La contraseña es incorrecta");
        document.ingresar.clave.focus();
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