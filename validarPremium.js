var numeros="0123456789";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return true;
      }
   }
   return false;
}

function validarPremium(){

if (document.premium.nombre.value == null || document.premium.nombre.value.length == 0 || /^\s+$/.test(document.premium.nombre.value)) {
		alert("El campo nombre esta vacio.");
        document.premium.nombre.focus();
        return (false);
	}
	
	if ((tiene_numeros(document.premium.nombre.value)) || (!(tiene_letras(document.premium.nombre.value)))) {
	alert("Ingrese un caracter valido en el titular de la tarjeta");
        document.premium.nombre.focus();
        return (false);
	}

	if (document.premium.numero.value.length != 16)  {
		alert("El numero de tarjeta debe ser de 16 digitos");
        document.premium.numero.focus();
        return false;
	}
	
	if(!(/^\d{16}$/.test(document.premium.numero.value))) {
		alert ("Ingrese un caracter valido en el numero de la tarjeta");
		document.premium.numero.focus();
		return false;
	}
	
	if (document.premium.clave.value.length != 3) {
		alert("La clave debe ser de 3 digitos");
		 document.premium.clave.focus();
		 return false;
	}
	
	if(!(/^\d{3}$/.test(document.premium.clave.value))) {
		alert ("Ingrese un caracter valido en la clave de la tarjeta");
		document.premium.clave.focus();
		return false;
	}
	
	document.premium.submit();
}

