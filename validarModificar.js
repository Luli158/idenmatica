function validacionT() {
  valor = document.getElementById("nombre").value;
  if ( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
    // Si no se cumple la condicion...
    alert('El campo nombre tiene un valor inválido.');
    return false;
  }
  return true;
}


function esValidadoT(){
  if (validacionT()){
    document.modificar.submit();
  }
}

function cambiarTexto(){
  if(document.modificar.boton.value=="Bloquear"){
    document.modificar.boton.value="Desbloquear";
  }
  else{
    document.modificar.boton.value="Bloquear";
  }
}
