
function validarPremium(){

	if (document.premium.numero.value.length != 16)  {
		alert("El numero de tarjeta debe ser de 16 digitos");
        document.premium.numero.focus();
        return false;
	}
	
	if(!(/^\d{16}$/.test(document.premium.numero.value))) {
		alert ("Ingrese un caracter valido");
		document.premium.numero.focus();
		return false;
	}
	
	if (document.premium.clave.value.length != 3) {
		alert("La clave debe ser de 3 digitos");
		 document.premium.clave.focus();
		 return false;
	}
	
	if(!(/^\d{3}$/.test(document.premium.clave.value))) {
		alert ("Ingrese un caracter valido");
		document.premium.clave.focus();
		return false;
	}
	
	document.premium.submit();
}

