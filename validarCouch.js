
function validarCouch(){
	if (document.couch.titulo.value == null || document.couch.titulo.value.length == 0 || /^\s+$/.test(document.couch.titulo.value)) {
		alert("El campo titulo esta vacio.");
        document.couch.titulo.focus();
        return (false);
	}
	if (document.couch.ubicacion.value == null || document.couch.ubicacion.value.length == 0 || /^\s+$/.test(document.couch.ubicacion.value)) {
		alert("El campo ubicacion esta vacio.");
        document.couch.ubicacion.focus();
        return (false);
	}
	if (document.couch.habitantes.value == null || document.couch.habitantes.value.length == 0 || /^\s+$/.test(document.couch.habitantes.value) || document.couch.habitantes.value < 1) {
		alert("El campo cantidad de habitantes esta vacio o su valor es menor a 1.");
        document.couch.habitantes.focus();
        return (false);
	}
	if (document.couch.capacidad.value == null || document.couch.capacidad.value.length == 0 || /^\s+$/.test(document.couch.capacidad.value) || document.couch.capacidad.value < 1) {
		alert("El campo capacidad esta vacio o su valor es menor a 1.");
        document.couch.capacidad.focus();
        return (false);
	}
	document.couch.submit();
}