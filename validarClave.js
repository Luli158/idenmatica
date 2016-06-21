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

function validarClave(){
  if (document.cambiarclave.clave.value != document.cambiarclave.claveactual.value) {
    alert("La contrase\u00F1a ingresada no es la correcta.");
        document.cambiarclave.clave.focus();
        return (false);
  }
  if (document.cambiarclave.pass.value.length < 4 || document.cambiarclave.pass.value.length > 15) {
    alert("Ingrese una contrase\u00F1a entre 4 y 15 caracteres.");
        document.cambiarclave.pass.focus();
        return (false);
  }
  if (document.cambiarclave.pass.value != document.cambiarclave.pass2.value) {
    alert("Las contrase\u00F1as ingresadas no coinciden.");
        document.cambiarclave.pass.focus();
        return (false);
  }
  document.cambiarclave.submit();
}