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