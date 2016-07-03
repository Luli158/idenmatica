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

function esMayor(date){
  var nacimiento=new Date(date);
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

function validarPerfil(){
	if (document.mperfil.nombre.value == null || document.mperfil.nombre.value.length == 0 || /^\s+$/.test(document.mperfil.nombre.value)) {
		alert("El campo nombre esta vacio.");
        document.mperfil.nombre.focus();
        return (false);
	}
	if (document.mperfil.apellido.value == null || document.mperfil.apellido.value.length == 0 || /^\s+$/.test(document.mperfil.apellido.value)) {
		alert("El campo apellido esta vacio.");
        document.mperfil.apellido.focus();
        return (false);
	}
  if (document.registro.nacimiento.value == null || document.registro.nacimiento.value.length == 0 || /^\s+$/.test(document.registro.nacimiento.value)) {
    alert("El campo fecha de nacimiento esta vacio.");
        document.registro.nacimiento.focus();
        return (false);
  }
  if (!esMayor(document.registro.nacimiento.value)) {
    alert("Para registrarse en CouchInn debes ser mayor de edad. Gracias.");
        document.registro.nacimiento.focus();
        return (false);
  }
	if (document.mperfil.DNI.value.length < 6 || document.mperfil.DNI.value.length > 8) {
		alert("Ingrese un DNI valido.");
        document.mperfil.DNI.focus();
        return (false);
	}
	if (document.mperfil.direccion.value.length < 3 || document.mperfil.direccion.value.length > 40) {
		alert("Ingrese una direccion valida.");
        document.mperfil.direccion.focus();
        return (false);
	}
	document.mperfil.submit();
}