var numeros="0123456789";
var letras="abcdefghijklmnñopqrstuvwxyz";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return true;
      }
   }
   return false;
}

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

function esMayor(){
	var nacimiento=document.registro.nacimiento.value;
	var ndia = nacimiento.getDate()+1;//NO SE POR QUÉ ME TIRA UN NUMERO MENOS DEL QUE ELEGIS EN EL INPUT DATE
	var nmes = nacimiento.getMonth()+1;
	var nanio= nacimiento.getFullYear();
	hoy = new Date();
	var hdia = hoy.getDate();//ACÁ TOMA BIEN EL NUMERO, ASI QUE NO SE QUÉ ONDA
	var hmes = hoy.getMonth()+1;
	var hanio= hoy.getFullYear();
	//edad = parseInt((fechahoy-fechanac)/365/24/60/60/1000);
	if ((hanio-nanio) < 18) {		
		return false;
	}
	if((hmes-nmes) < 0){
		return false;
	}
	if((hdia-ndia) < 0){
		return false;
	}
	return true;
}

function validarRegistro(){
	if ((!validarCorreo(document.registro.user.value)) || (document.registro.user.value == null || document.registro.user.value.length == 0 || /^\s+$/.test(document.registro.user.value))) {
		alert('La direccion de correo no es valida');
		document.registro.user.focus();
		return false;
	}
	if ((document.registro.pass.value.length < 4 || document.registro.pass.value.length > 15) & (!(tiene_numeros(document.registro.pass.value)) & !(tiene_letras(document.registro.pass.value)))) {
		alert("Ingrese una contrase\u00F1a entre 4 y 15 caracteres.");
        document.registro.pass.focus();
        return (false);
	}
	if (document.registro.pass.value != document.registro.pass2.value) {
		alert("Las contrase\u00F1s ingresadas no coinciden.");
        document.registro.pass.focus();
        return (false);
	}
	if (document.registro.nombre.value == null || document.registro.nombre.value.length == 0 || /^\s+$/.test(document.registro.nombre.value)) {
		alert("El campo nombre esta vacio.");
        document.registro.nombre.focus();
        return (false);
	}
	if (document.registro.apellido.value == null || document.registro.apellido.value.length == 0 || /^\s+$/.test(document.registro.apellido.value)) {
		alert("El campo apellido esta vacio.");
        document.registro.apellido.focus();
        return (false);
	}
	if (document.registro.nacimiento.value == null || document.registro.nacimiento.value.length == 0 || /^\s+$/.test(document.registro.nacimiento.value)) {
		alert("El campo fecha de nacimiento esta vacio.");
        document.registro.nacimiento.focus();
        return (false);
	}
	if (!esMayor()) {
		alert("Para registrarse en CouchInn debes ser mayor de edad. Gracias.");
        document.registro.nacimiento.focus();
        return (false);
	}
	if (document.registro.DNI.value.length < 6 || document.registro.DNI.value.length > 8) {
		alert("Ingrese un DNI valido.");
        document.registro.DNI.focus();
        return (false);
	}
	if (document.registro.direccion.value.length < 3 || document.registro.direccion.value.length > 40) {
		alert("Ingrese una direccion valida.");
        document.registro.direccion.focus();
        return (false);
	}
	document.registro.submit();
}

function validarCorreo(email) {
	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if(regex.test(email.trim())) {
		return true;
	}
	else {
		return false;
	}
}